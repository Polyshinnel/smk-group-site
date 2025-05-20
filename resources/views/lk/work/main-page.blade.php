@extends('lk.work.layer.layer')
@section('title', $pageInfo['title'])
@section('description', $pageInfo['description'])

@section('content')
<div class="cards-container">
    <a href="/lk/bill" class="card">
        <div class="card-content">
            <h3>Неоплаченные счета</h3>
            <div class="count">{{ $commonData['unpaidCount'] }}</div>
        </div>
    </a>

    <a href="/lk/result" class="card">
        <div class="card-content">
            <h3>Завершенные исследования</h3>
            <div class="count">{{ $commonData['doneResearchCount'] }}</div>
        </div>
    </a>
</div>

<style>
.cards-container {
    display: flex;
    gap: 30px;
    padding: 30px;
}

.card {
    text-decoration: none;
    color: inherit;
    flex: 1;
}

.card-content {
    background: white;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
}

.card h3 {
    margin: 0 0 20px 0;
    font-size: 20px;
}

.count {
    font-size: 36px;
    font-weight: bold;
    transition: color 0.3s ease;
}

.card:hover .count {
    color: #4CAF50;
}

.card:hover .card-content {
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}
</style>
@endsection
