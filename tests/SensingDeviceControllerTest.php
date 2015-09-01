<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 7/28/2015
 * Time: 1:06 AM
 */

class SensingDeviceControllerTest extends testCase{
    public function testStoreSensingDevice()
    {
        $device= array(
         'device_id'=>'test123456'
        );
        $sensingDevice = new
    }
    public function testEditDevice(){
        $device= array(
            'device_id'=>'test789012',
            'plot_id'=>'1'
        );
        $this->call('POST','device',$device);
        $this->call('GET', 'device/1/edit');
        $this->assertResponseOk();
    }
    public function testShowPlot(){
        $this->call('GET','device/1');
    }
    public function testUpdatePlot(){
        $device= array(
            'device_id'=>'test123456',
            'plot_id'=>'3'
        );
        $device2= array();
        $this->call('PUT','plot/1',$device);
        $this->call('PUT','plot/2',$device2);
    }
    public function testDestroyDevice(){
        $this->call('DELETE','device/1');
        $this->call('DELETE','device/2');
        $this->assertResponseStatus(500);
    }
    public function testRemovePlotFromDevice(){
        $this->call('GET','device/destroy/1');
        $this->call('GET','device/destroy/');
    }
}