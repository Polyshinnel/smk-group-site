@extends('lk.work.layer.layer')
@section('title', $pageInfo['title'])
@section('description', $pageInfo['description'])

@section('content')
<div class="page-container">
    <!-- Секция счетов -->
    <div class="section-container">
        <h2 class="section-title">Счета</h2>
        <div class="results-grid">
            @if($invoices->isEmpty())
                <div class="no-results">Нет доступных счетов</div>
            @else
                @foreach($invoices as $invoice)
                    <a href="/storage/{{ $invoice->filepath }}" download class="result-card">
                        <h3 class="result-name">{{ $invoice->name }}</h3>
                        <p class="result-research">Счет №{{ $invoice->number }}</p>
                        <p class="result-date">{{ $invoice->created_at->format('d.m.Y') }}</p>
                        <p class="result-status">Статус: {{ $invoice->billStatus->name }}</p>
                    </a>
                @endforeach
            @endif
        </div>
    </div>

    <!-- Секция результатов -->
    <div class="section-container">
        <h2 class="section-title">Результаты исследования</h2>
        <div class="results-grid">
            @if($researchResults->isEmpty())
                <div class="no-results">Нет доступных результатов</div>
            @else
                @foreach($researchResults as $result)
                    <a href="/storage/{{ $result->filepath }}" download class="result-card">
                        <h3 class="result-name">{{ $result->name }}</h3>
                        <p class="result-research">Исследование №{{ $result->research_id }}</p>
                        <p class="result-date">{{ $result->created_at->format('d.m.Y') }}</p>
                    </a>
                @endforeach
            @endif
        </div>
    </div>

    <!-- Секция закрывающих документов -->
    <div class="section-container">
        <h2 class="section-title">Закрывающие документы</h2>
        <div class="results-grid">
            @if($closingDocuments->isEmpty())
                <div class="no-results">Нет доступных закрывающих документов</div>
            @else
                @foreach($closingDocuments as $document)
                    <a href="/storage/{{ $document->filepath }}" download class="result-card">
                        <h3 class="result-name">{{ $document->name }}</h3>
                        <p class="result-research">Исследование №{{ $document->research->id }}</p>
                        <p class="result-date">{{ $document->created_at->format('d.m.Y') }}</p>
                    </a>
                @endforeach
            @endif
        </div>
    </div>
</div>

<style>
    .page-container {
        max-width: 1200px;
        padding: 20px 20px 20px 0;
    }

    .section-container {
        margin-bottom: 40px;
    }

    .section-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
        color: #333;
        border-bottom: 2px solid #4CAF50;
        padding-bottom: 10px;
    }

    .results-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 20px;
    }

    .result-card {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        padding: 15px;
        transition: box-shadow 0.3s ease;
        text-decoration: none;
        color: inherit;
        display: block;
        border-left: 4px solid #4CAF50;
    }

    .result-card:hover {
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }

    .result-name {
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .result-research {
        color: #666;
        font-size: 14px;
        margin-bottom: 5px;
    }

    .result-date {
        color: #888;
        font-size: 14px;
        margin-bottom: 5px;
    }

    .result-status {
        color: #4CAF50;
        font-size: 14px;
        font-weight: 500;
    }

    .no-results {
        grid-column: 1 / -1;
        text-align: left;
        padding: 30px 0 0 0;
        color: #666;
        font-size: 18px;
        background: #f5f5f5;
        border-radius: 8px;
    }

    @media (max-width: 1200px) {
        .results-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (max-width: 768px) {
        .results-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection