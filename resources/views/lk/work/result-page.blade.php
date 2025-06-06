@extends('lk.work.layer.layer')
@section('title', $pageInfo['title'])
@section('description', $pageInfo['description'])

@section('content')
<div class="results-container">
    <h1 class="results-title">Результаты исследований</h1>
    
    <div class="results-grid">
        @if($researchResult->isEmpty())
            <div class="no-results">Нет доступных результатов исследований</div>
        @else
            @foreach($researchResult as $result)
                <a href="/lk/result/{{ $result->id }}" class="result-card" style="border-left: 4px solid {{ $result->status->color ?? '#4CAF50' }}">
                    <h3 class="result-name">{{ $result->name }}</h3>
                    <p class="result-number">№ {{ $result->id }}</p>
                    <p class="result-date">{{ $result->created_at->format('d.m.Y') }}</p>
                    <span class="result-status" 
                          style="background-color: {{ $result->status->color ?? '#4CAF50' }}20; color: {{ $result->status->color ?? '#4CAF50' }}">
                        {{ $result->status->name ?? 'Завершено' }}
                    </span>
                </a>
            @endforeach
        @endif
    </div>
</div>

<style>
    .results-container {
        max-width: 1200px;
        padding: 30px 20px 20px 0;
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
        margin-top: 30px;
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
    }

    .result-card:hover {
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }

    .result-name {
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .result-number {
        color: #666;
        font-size: 14px;
        margin-bottom: 5px;
    }

    .result-date {
        color: #888;
        font-size: 14px;
        margin-bottom: 10px;
    }

    .result-status {
        display: inline-block;
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 14px;
    }

    .no-results {
        grid-column: 1 / -1;
        text-align: left;
        padding: 20px 0 0 0;
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