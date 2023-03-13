<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\CustomerModel;
use App\Entities\CustomerEntity;

class CustomerController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        if ($this->request->isAJAX()) {
            // response ajax
            // arahkan ke function show tanpa parameter id
            return $this->show();
        } else {
            // response non ajax
            return view('customer/index', [
                'title' => 'Customer',
            ]);
        }
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $cust_mod = new CustomerModel();
        if ($id == null) {
            // jika parameter id tidak ada / null
            if ($this->request->getMethod() == 'post') {
                // jika request method post, tampil datatable
                return $this->respond([], 200, 'You Get Datatable');
            } else if ($this->request->getMethod() == 'get') {
                // jika request method get, tampil list biasa
                $cust_lists = $cust_mod->find();
                return $this->respond($cust_lists);
            }
        } else {
            // jika ada parameter id
            if ($this->_getCustomer($id, 'with')) {
                // jika ada nilainya
                if ($this->_getCustomer($id)) {
                    // customer masih aktif
                    return $this->respond($this->_getCustomer($id));
                } else {
                    // customer sudah di delete
                    return $this->respondNoContent();
                }
            } else {
                // jika tidak ada
                return $this->failNotFound();
            }
        }
    }

    private function _getCustomer($id, $WithOnlyDeleted = false)
    {
        $cust_mod = new CustomerModel();
        if ($WithOnlyDeleted == 'with') {
            $custData = $cust_mod->withDeleted()->find($id);
        } else if ($WithOnlyDeleted == 'only') {
            $custData = $cust_mod->onlyDeleted()->find($id);
        } else {
            $custData = $cust_mod->find($id);
        }
        if (is_null($custData)) {
            return false;
        }
        return $custData;
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $cust_mod = new CustomerModel();
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null, $activation = false)
    {
        $cust_mod = new CustomerModel();
        if ($activation) {
            // lakukan aktivasi user
            if ($this->_getCustomer($id, 'only')) {
                // customer tidak aktif
                // update deleted_at
                return $this->respondUpdated($cust_mod->update($id, [$cust_mod->deletedField => null]));
            } else {
                // customer masih aktif
                return $this->respondNoContent();
            }
        } else {
            // lakukan edit user seperti biasa
            return $this->respondUpdated([]);
        }
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $cust_mod = new CustomerModel();
    }
}
