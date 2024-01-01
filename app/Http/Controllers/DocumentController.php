<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = Document::all();
        return view('document.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('document.create',compact('categories'));
        // dd($categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          // Validation logic

    // $file = $request->file('attachment');
    // $fileName = 'document_' . time() . '.' . $file->getClientOriginalExtension();
    // $file->move(public_path('uploads'), $fileName);

    // dd($request->all());
    $document = Document::create([
        'title' => $request->input('title'),
        'content' => $request->input('content'),
        'category_id' => $request->input('category_id'),
        // 'is_published' => $request->input('is_published'),
        // 'file_path' => 'uploads/' . $fileName,
    ]);

    dd($document);
    // Attach tags if needed

    return redirect()->route('documents.index')->with('success', 'Document created successfully.');
    // dd($document);
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        //
    }
}
