@extends('lk.work.layer.layer')
@section('title', $pageInfo['title'])
@section('description', $pageInfo['description'])

@section('content')
<div class="documents-container">
    <h1 class="documents-title">Закрывающие документы</h1>
    
    <div class="documents-grid">
        @if($closedDocuments->isEmpty())
            <div class="no-documents">Нет закрывающих документов</div>
        @else
            @foreach($closedDocuments as $document)
                <a href="/storage/{{ asset($document->filepath) }}" download class="document-card">
                    <h3 class="document-name">{{ $document->name }}</h3>
                    <p class="document-research">Исследование: {{ $document->research->name }}</p>
                    <p class="document-date">{{ $document->created_at->format('d.m.Y') }}</p>
                </a>
            @endforeach
        @endif
    </div>
</div>

<style>
    .documents-container {
        max-width: 1200px;
        padding: 20px 20px 20px 0;
    }

    .documents-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .documents-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 20px;
    }

    .document-card {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        padding: 15px;
        transition: box-shadow 0.3s ease;
        text-decoration: none;
        color: inherit;
        display: block;
    }

    .document-card:hover {
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }

    .document-name {
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .document-research {
        color: #666;
        font-size: 14px;
        margin-bottom: 5px;
    }

    .document-date {
        color: #888;
        font-size: 14px;
        margin-bottom: 10px;
    }

    .no-documents {
        grid-column: 1 / -1;
        text-align: left;
        padding: 30px 0 0 0;
        color: #666;
        font-size: 18px;
        background: #f5f5f5;
        border-radius: 8px;
    }

    @media (max-width: 1200px) {
        .documents-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (max-width: 768px) {
        .documents-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection
