<?php
namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;

class BaseController extends Controller
{

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['site_helper', 'form'];

    /**
     * Constructor.
     */
    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        //--------------------------------------------------------------------
        // Preload any models, libraries, etc, here.
        //--------------------------------------------------------------------
        // E.g.:
        // $this->session = \Config\Services::session();
    }

    protected function containsOnlyNull($input)
    {
        return empty(array_filter($input, function ($a) { return $a !== null;}));
    }

    protected function loadView($viewName, $data = [], $footer = 'footer_form')
    {
        $footer = 'template/' . $footer;

        echo view('template/header');
        echo view($viewName, $data);
        echo view($footer);
    }

    protected function loadMainView($model, $orderBy, $viewName, $objectName = 'object')
    {
        // Return all records
        $objects = $model->orderBy($orderBy)->findAll();

        // Store in data array
        $data[$objectName] = $objects;

        // Load the view
        $this->loadView($viewName, $data, 'footer');
    }

    protected function loadAddView($viewName, $data = [])
    {
        $this->loadView($viewName, $data);
    }

    protected function loadEditView($model, $id, $viewName, $objectName = 'object', $data = [])
    {
        // Return the record
        $object = $model->find($id);

        // Store in data array
        $data[$objectName] = $object;

        $this->loadAddView($viewName, $data);
    }

    protected function checkVar($varName)
    {
        $var = $this->request->getVar($varName) == null ? false : true;

        if(!$var)
        {
            $this->loadUnauthorisedView();
        }

        return $var;
    }

    protected function loadUnauthorisedView()
    {
        $this->loadView('unauthorised');
        exit();
    }

    protected function saveRecord($model, $formData, $redirect = 'Home', $fieldName = null, $fieldRules = null)
    {
        // Add validation if required
        if($fieldName && $fieldRules)
        {
            $model->setValidationRule($fieldName, $fieldRules);
        }

        // Insert the record, return the ID
        $id = $model->save($formData);

        // If we got an ID back, redirect to main view
        if($id)
        {
            return $this->response->redirect(site_url($redirect));
        }
        else
        {
            // Load the Model's errors
            $data['errors'] = $model->errors();

            // Load the form data
            $data['formData'] = $formData;

            // Load the errors view
            $this->loadView('db_error', $data);
        }
    }

    protected function deleteRecord($model, $pk, $id, $redirect = 'Home')
    {
        $model->where($pk, $id)->delete();
        return $this->response->redirect(site_url($redirect));
    }

    protected function parseId($id, $data)
    {
        // Include either the ID or the create user
        if($id)
        {
            $data['id'] = $id;
        }
        else
        {
            $data['create_user'] = get_current_user();
        }

        return $data;
    }

    protected function getVarNull($varName)
    {
        return $this->request->getVar($varName) == '' ? null: $this->request->getVar($varName);
    }

    protected function getList($model, $fieldName, $orderBy = 'id ASC', $placeHolder = 'Select from dropdown')
    {
        // Return all records
        $objects = $model->orderBy($orderBy)->findAll();

        // Convert to array
        $objectArray = build_array_from_object($objects, $fieldName, true, $placeHolder);

        if($placeHolder == null)
        {
            return $objects;

        }
        else
        {
            return $objectArray;
        }
    }

    protected function getMtmList($model, $id, $whereColumn, $returnColumn)
    {
        // Return all Hardware records for the Mover
        $mtm = $model->where($whereColumn, $id)->findColumn($returnColumn);

        // Return empty array if there are no records
        if($mtm == null)
        {
            $mtm = array();
        }

        return $mtm;
    }

}
