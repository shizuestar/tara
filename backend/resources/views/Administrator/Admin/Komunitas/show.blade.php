<x-admin-layout>
    @push('styles')
    <style>
        :root {
            --primary-bg: #ffffff;
            --secondary-bg: #f8f8f8;
            --text-color: #1a1a1a;
            --accent-color: #FFD700;
            --border-color: #e0e0e0;
            --hover-color: #f5f5f5;
            --sidebar-width: 280px;
            --content-margin: 40px;
            --navbar-height: 70px;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Space Grotesk', sans-serif;
            background: var(--secondary-bg);
            color: var(--text-color);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
        }

        .content-background {
            background: var(--primary-bg);
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
        }

        .page-header {
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .page-title {
            font-size: 28px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .page-title i {
            color: var(--accent-color);
        }

        .btn {
            padding: 10px 20px;
            background: var(--text-color);
            color: var(--primary-bg);
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 500;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn:hover {
            background: #333;
        }

        .btn-primary {
            background: var(--accent-color);
            color: var(--text-color);
        }

        .btn-primary:hover {
            background: #e6c300;
        }

        .content-section {
            background: var(--primary-bg);
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .detail-info {
            margin-bottom: 30px;
        }

        .detail-info h3 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .detail-info p {
            margin-bottom: 10px;
        }

        .detail-list {
            margin-bottom: 30px;
        }

        .detail-list h3 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .table-container {
            overflow-x: auto;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid var(--border-color);
        }

        th {
            font-weight: 600;
            color: #666;
            font-size: 14px;
            background: var(--secondary-bg);
        }

        tr:hover {
            background: var(--secondary-bg);
        }

        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .action-btn {
            width: 34px;
            height: 34px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--secondary-bg);
            color: var(--text-color);
            text-decoration: none;
            transition: all 0.3s;
        }

        .action-btn:hover {
            background: var(--accent-color);
            color: var(--text-color);
        }

        .btn-view {
            background: rgba(46, 213, 115