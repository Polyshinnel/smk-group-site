@extends('lk.work.layer.layer')
@section('title', $pageInfo['title'])
@section('description', $pageInfo['description'])

@section('content')
<div class="results-container">
    <h1 class="results-title">Результаты исследования</h1>
    
    <div class="results-grid">
        @if($researchResults->isEmpty())
            <div class="no-results">Нет доступных результатов</div>
        @else
            @foreach($researchResults as $result)
                <a href="/storage/{{ asset($result->filepath) }}" download class="result-card">
                    <h3 class="result-name">{{ $result->name }}</h3>
                    <p class="result-research">Исследование №{{ $result->research_id }}</p>
                    <p class="result-date">{{ $result->created_at->format('d.m.Y') }}</p>
                </a>
            @endforeach
        @endif
    </div>
</div>

<style>
    .results-container {
        max-width: 1200px;
        padding: 20px 20px 20px 0;
    }

    .results-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
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
        margin-bottom: 10px;
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