<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Libro;

class Libros extends Controller
{


    public function listar()
    {

        $libro = new Libro();

        $data['libros'] = $libro->findAll();
        $data['cabecera'] = view('templates/cabecera');
        $data['piepagina'] = view('templates/piepagina');

        return view('libros/listar', $data);
    }


    public function crear()
    {
        $data['cabecera'] = view('templates/cabecera');
        $data['piepagina'] = view('templates/piepagina');
        return view('libros/crear', $data);
    }

    public function guardar()
    {
        $libro = new Libro();

        $nombre =  $this->request->getVar('nombre');

       
        $validacion = $this->validate([
            'nombre'=>'required|min_length[3]',
            'imagen' => [
                'uploaded[imagen]',
                'mime_in[imagen,image/jpg,image/jpeg,image/png]',
                'max_size[imagen,1024]',
            ]
        ]);

        if(!$validacion){
            return redirect()->to(base_url('listar'));
        }

        if ($imagen = $this->request->getFile('imagen')) {
            $nombre_imagen = $nombre . '.' . $imagen->getExtension();
            $imagen->move('../public/uploads/', $nombre_imagen);

            $data = array(
                'nombre' => $nombre,
                'imagen' => $nombre_imagen
            );

            $libro->insert($data);
            return redirect()->to(base_url('listar'));
        }
    }


    public function borrar()
    {
        $id = $this->request->getPostGet('id');
        $libro = new Libro();
        $reg_libro = $libro->find($id);
        $ruta = '../public/uploads/' . $reg_libro['imagen'];
        unlink($ruta);

        $libro->delete($id);

        return redirect()->to(base_url('listar'));
    }

    public function editar()
    {
        $id = $this->request->getPostGet('id');
        $libro = new Libro();
        $data['cabecera'] = view('templates/cabecera');
        $data['piepagina'] = view('templates/piepagina');
        $reg_libro = $libro->find($id);
        $data['libro'] = $reg_libro;

        return view('libros/editar', $data);
    }

    public function actualizar()
    {
        $libro = new Libro();
        $nombre = $this->request->getPost('nombre');
        $id = $this->request->getPost('id');

        $validacion = $this->validate([
            'imagen' => [
                'uploaded[imagen]',
                'mime_in[imagen,image/jpg,image/jpeg,image/png]',
                'max_size[imagen,1024]',
            ]
        ]);

        if ($validacion) {
            if ($imagen = $this->request->getFile('imagen')) {
                $nombre_imagen = $nombre . '.' . $imagen->getExtension();

                $imagen->move('../public/uploads/', $nombre_imagen);
                
                $data = array(
                    'nombre' => $nombre,
                    'imagen' => $nombre_imagen
                );

                $reg_libro = $libro->find($id);
                $ruta = '../public/uploads/' . $reg_libro['imagen'];
                unlink($ruta);

                $libro->update($id, $data);
            }
        }
        return redirect()->to(base_url('listar'));
    }
}
