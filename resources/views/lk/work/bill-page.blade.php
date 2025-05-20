@extends('lk.work.layer.layer')
@section('title', $pageInfo['title'])
@section('description', $pageInfo['description'])

@section('content')
<div class="bills-container">
    <h1 class="bills-title">Счета</h1>
    
    <div class="bills-grid">
        @if($userBills->isEmpty())
            <div class="no-bills">Нет выставленных счетов</div>
        @else
            @foreach($userBills as $bill)
                <a href="{{ asset($bill->filepath) }}" download class="bill-card" style="border-left: 4px solid {{ $bill->billStatus->color }}">
                    <h3 class="bill-name">{{ $bill->name }}</h3>
                    <p class="bill-number">№ {{ $bill->bill_number }}</p>
                    <p class="bill-date">{{ $bill->created_at->format('d.m.Y') }}</p>
                    <span class="bill-status" 
                          style="background-color: {{ $bill->billStatus->color }}20; color: {{ $bill->billStatus->color }}">
                        {{ $bill->billStatus->name }}
                    </span>
                </a>
            @endforeach
        @endif
    </div>
</div>

<style>
    .bills-container {
        max-width: 1200px;
        padding: 20px 20px 20px 0;
    }

    .bills-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .bills-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 20px;
    }

    .bill-card {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        padding: 15px;
        transition: box-shadow 0.3s ease;
        text-decoration: none;
        color: inherit;
        display: block;
    }

    .bill-card:hover {
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }

    .bill-name {
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .bill-number {
        color: #666;
        font-size: 14px;
        margin-bottom: 5px;
    }

    .bill-date {
        color: #888;
        font-size: 14px;
        margin-bottom: 10px;
    }

    .bill-status {
        display: inline-block;
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 14px;
    }

    .no-bills {
        grid-column: 1 / -1;
        text-align: left;
        padding: 30px 0 0 0;
        color: #666;
        font-size: 18px;
        background: #f5f5f5;
        border-radius: 8px;
    }

    @media (max-width: 1200px) {
        .bills-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (max-width: 768px) {
        .bills-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection