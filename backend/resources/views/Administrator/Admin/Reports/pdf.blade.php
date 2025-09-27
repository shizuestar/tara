<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Laporan Platform</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        .header { text-align: center; margin-bottom: 20px; }
        .header h1 { color: #FFD700; }
        .summary { margin-bottom: 20px; }
        .summary table { width: 100%; border-collapse: collapse; }
        .summary th, .summary td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        .summary th { background-color: #FFD700; font-weight: bold; }
        .activities { margin-top: 20px; }
        .activities table { width: 100%; border-collapse: collapse; }
        .activities th, .activities td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        .activities th { background-color: #FFE0E0; font-weight: bold; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Laporan Platform TARA</h1>
        <p>Periode: {{ \Carbon\Carbon::parse($startDate)->format('d M Y') }} - {{ \Carbon\Carbon::parse($endDate)->format('d M Y') }}</p>
    </div>

    <div class="summary">
        <h2>Ringkasan</h2>
        <table>
            <tr><th>Statistik</th><th>Jumlah</th></tr>
            <tr><td>Total Komunitas</td><td>{{ $data['totalCommunities'] }}</td></tr>
            <tr><td>Total Project</td><td>{{ $data['totalProjects'] }}</td></tr>
            <tr><td>Total Karya</td><td>{{ $data['totalArtworks'] }}</td></tr>
            <tr><td>Total Event</td><td>{{ $data['totalEvents'] }}</td></tr>
            <tr><td>Total Pengguna Aktif</td><td>{{ $data['totalActiveUsers'] }}</td></tr>
            <tr><td>Total Suka</td><td>{{ $data['totalLikes'] }}</td></tr>
            <tr><td>Total Komentar</td><td>{{ $data['totalComments'] }}</td></tr>
        </table>
    </div>

    <div class="activities">
        <h2>Laporan Aktivitas</h2>
        <table>
            <tr><th>ID</th><th>Pengguna</th><th>Deskripsi</th><th>Subjek</th><th>Tanggal</th></tr>
            @foreach ($data['activities'] as $activity)
                <tr>
                    <td>{{ $activity['id'] }}</td>
                    <td>{{ $activity['user'] }}</td>
                    <td>{{ $activity['description'] }}</td>
                    <td>{{ $activity['subject'] }}</td>
                    <td>{{ $activity['date'] }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>