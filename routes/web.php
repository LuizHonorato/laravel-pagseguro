<?php

$this->get('pagseguro-transparent-card', 'PagSeguroController@card')->name('pagseguro.transparent.card');

$this->post('pagseguro-billet', 'PagSeguroController@billet')->name('pagseguro.billet');

$this->post('pagseguro-transparente', 'PagSeguroController@getCode')->name('pagseguro.code.transparente');

$this->get('pagseguro-transparente', 'PagSeguroController@transparente')->name('pagseguro.transparente');

$this->get('pagseguro-lightbox', 'PagSeguroController@lightbox')->name('pagseguro.lightbox');

$this->post('pagseguro-lightbox', 'PagSeguroController@lightboxCode')->name('pagseguro.lightbox.code');

$this->get('pagseguro', 'PagSeguroController@pagseguro')->name('pagseguro');

Route::get('/', function () {
    return view('welcome');
});
