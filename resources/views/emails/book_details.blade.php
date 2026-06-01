<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9fafb;
            color: #374151;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }
        .header {
            background-color: #2563eb;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 20px;
        }
        .book-cover {
            text-align: center;
            margin-bottom: 20px;
        }
        .book-cover img {
            max-width: 200px;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .details-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .details-table th, .details-table td {
            padding: 12px;
            border-bottom: 1px solid #e5e7eb;
            text-align: left;
        }
        [dir="rtl"] .details-table th, [dir="rtl"] .details-table td {
            text-align: right;
        }
        .details-table th {
            color: #6b7280;
            font-weight: bold;
            width: 30%;
        }
        .footer {
            background-color: #f3f4f6;
            padding: 15px;
            text-align: center;
            color: #9ca3af;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>{{ __('messages.book_overview') ?? 'Book Details' }}</h1>
        </div>
        
        <div class="content">
            <div class="book-cover">
                @php
                    // Get absolute URL for the image so it loads in email clients
                    if (!empty($book->cover) && str_starts_with($book->cover, 'http')) {
                        $imageUrl = $book->cover;
                    } else {
                        $imageUrl = asset('covers/' . (!empty($book->cover) ? $book->cover : 'no_cover.jpg'));
                    }
                @endphp
                <img src="{{ $imageUrl }}" alt="{{ $book->designation }}">
            </div>

            <h2>{{ $book->designation }}</h2>
            <p>{{ $book->description }}</p>

            <table class="details-table">
                <tr>
                    <th>{{ __('messages.author') ?? 'Author' }}</th>
                    <td>{{ $book->auteur }}</td>
                </tr>
                <tr>
                    <th>{{ __('messages.price') ?? 'Price' }}</th>
                    <td>{{ number_format($book->prix, 2) }} DH</td>
                </tr>
                <tr>
                    <th>{{ __('messages.category') ?? 'Category' }}</th>
                    <td>{{ $book->categorie ?: '-' }}</td>
                </tr>
                <tr>
                    <th>{{ __('messages.publisher') ?? 'Publisher' }}</th>
                    <td>{{ $book->editeur ?: '-' }}</td>
                </tr>
                <tr>
                    <th>{{ __('messages.creation_date') ?? 'Year' }}</th>
                    <td>{{ $book->annee ?: '-' }}</td>
                </tr>
            </table>
        </div>
        
        <div class="footer">
            &copy; {{ date('Y') }} Bibliotech. All rights reserved.
        </div>
    </div>
</body>
</html>
