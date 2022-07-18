<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\BookInterface;
use App\Http\Requests\Admin\Book\DeleteBookRequest;
use App\Http\Requests\Admin\Book\UpdateBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    private $bookInterface;

    public function __construct(BookInterface $book)
    {
        $this->bookInterface = $book;
    }

    public function index()
    {
        return $this->bookInterface->index();
    }

    public function show($id)
    {
        return $this->bookInterface->showDetails($id);
    }

    public function update(UpdateBookRequest $request)
    {
        return $this->bookInterface->updateStatus($request);
    }

    public function destroy(DeleteBookRequest $request)
    {
        return $this->bookInterface->softDelete($request);
    }

}
