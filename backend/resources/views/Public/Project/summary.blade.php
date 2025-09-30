<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $project->project_name }} - Ringkasan Proyek</title>
    <style>
        /* CSS Variables for elegant, centralized color management */
        :root {
            --color-primary: #1c1c1c;       /* Dark charcoal for main text */
            --color-secondary: #5c5c5c;     /* Medium grey for labels/subtext */
            --color-background: #ffffff;    /* Clean white background */
            --color-accent: #ffc400;        /* Elegant Yellow pop/Gold accent */
            --color-border-light: #eeeeee;  /* Very light grey divider */
            --color-border-dark: #cccccc;   /* Darker grey for structure */
        }

        /* --- Base & Typography --- */
        body {
            font-family: 'Arial', sans-serif;
            font-size: 14px;
            line-height: 1.6;
            color: var(--color-primary);
            background-color: var(--color-background);
            padding: 50px;
            max-width: 850px;
            margin: 0 auto;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.05); /* Soft outer shadow for document look */
        }

        /* HEADER SECTION (Logo & Title) */
        .header-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-bottom: 20px;
            margin-bottom: 30px;
            border-bottom: 5px solid var(--color-accent); /* Bold yellow divider */
        }

        .header-title h1 {
            font-size: 36px;
            font-weight: 800;
            color: var(--color-primary);
            margin: 0;
            line-height: 1;
        }

        .header-title p {
            font-style: italic;
            color: var(--color-secondary);
            margin-top: 5px;
            font-size: 14px;
        }

        /* SVG & LOGO GIMMICK */
        .logo-placeholder {
            width: 80px;
            height: 80px;
            /* Placeholder styles - Ganti dengan logo Tara Anda */
        }

        .logo-placeholder svg {
            fill: var(--color-accent); /* Make the icon the yellow accent color */
            width: 100%;
            height: 100%;
        }
        
        /* --- General Sections --- */
        h2 {
            font-size: 22px;
            font-weight: 700;
            color: var(--color-primary);
            margin-top: 35px;
            margin-bottom: 15px;
            padding-left: 15px;
            border-left: 5px solid var(--color-secondary); /* Dark grey structure line */
        }

        .section {
            margin-bottom: 30px;
            padding: 20px;
            background-color: #f9f9f9; /* Off-white for section contrast */
            border-radius: 6px;
            border: 1px solid var(--color-border-light);
        }

        p, li {
            font-size: 14px;
            margin-bottom: 8px;
        }

        strong {
            font-weight: 700;
            color: var(--color-primary); /* Labels should be strong */
        }

        /* --- Project Details Styling --- */
        .project-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 15px 30px;
        }
        
        .project-details > div {
            padding: 5px 0;
        }

        /* --- Badges --- */
        .badge {
            padding: 4px 15px;
            border-radius: 3px;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 11px;
            letter-spacing: 0.8px;
            box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
        }

        .badge-ongoing { background: var(--color-accent); color: var(--color-primary); }
        .badge-pending { background: var(--color-border-dark); color: var(--color-primary); }
        .badge-completed { background: #22c55e; color: #fff; } /* Green for finality */

        /* --- Lists & Team --- */
        .section ul {
            list-style: none;
            padding: 0;
        }

        .section ul li {
            padding: 8px 0;
            border-bottom: 1px dashed var(--color-border-light);
            display: flex;
            justify-content: space-between;
        }

        .section ul li:last-child {
            border-bottom: none;
        }

        /* --- Progress Bar --- */
        .progress-bar-container {
            height: 12px;
            background-color: var(--color-border-light);
            border-radius: 6px;
            overflow: hidden;
            margin-top: 5px;
            border: 1px solid var(--color-border-dark);
        }

        .progress-bar {
            height: 100%;
            background-color: var(--color-accent);
            transition: width 0.5s ease-in-out;
            box-shadow: inset 0 -2px 0 rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="header-container">
        <div class="header-title">
            <h1>RINGKASAN PROYEK</h1>
            <p>{{ $project->project_name }}</p>
        </div>
        <div class="logo-placeholder">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 1L1 21H23L12 1ZM12 4.34L19.74 19H4.26L12 4.34ZM11 9V14H13V9H11ZM11 15V17H13V15H11Z"/>
            </svg>
        </div>
    </div>

    <div class="section">
        <h2>Detail Kunci</h2>
        <div class="project-details">
            <div><strong>Kategori:</strong> <span>{{ $project->category->name }}</span></div>
            <div><strong>Komunitas:</strong> <span>{{ $project->community->name }}</span></div>
            <div><strong>Status Project:</strong> <span><span class="badge badge-{{ $project->status }}">{{ $project->status_text }}</span></span></div>
            <div><strong>Dibuat Pada:</strong> <span>{{ $project->created_at->format('d M Y') }}</span></div>
            <div><strong>Periode (Mulai):</strong> <span>{{ $project->start_date ? \Carbon\Carbon::parse($project->start_date)->format('d M Y') : 'TBA' }}</span></div>
            <div><strong>Periode (Selesai):</strong> <span>{{ $project->end_date ? \Carbon\Carbon::parse($project->end_date)->format('d M Y') : 'TBA' }}</span></div>
        </div>
    </div>

    <div class="section" style="background-color: var(--color-background);">
        <h2>Deskripsi & Tujuan</h2>
        <p style="color: var(--color-secondary);"><strong>Deskripsi:</strong> {{ $project->description }}</p>
        <p style="margin-top: 15px; color: var(--color-secondary);"><strong>Tujuan Kolaborasi:</strong> {{ $project->collaboration_goals ?? 'Belum ada tujuan kolaborasi yang ditetapkan.' }}</p>
    </div>

    <div class="section">
        <h2>Progres Project Keseluruhan: {{ $project->progress }}%</h2>
        <div class="progress-bar-container">
            <div class="progress-bar" style="width: {{ $project->progress }}%;"></div>
        </div>
    </div>

    <div class="section">
        <h2>Linimasa Proyek (Milestones)</h2>
        @forelse($project->milestones as $milestone)
            <div style="margin-bottom: 15px; padding: 10px; border: 1px solid var(--color-border-light); border-left: 4px solid {{ $milestone->status === 'completed' ? '#22c55e' : 'var(--color-accent)' }}; border-radius: 3px;">
                <p><strong>{{ $milestone->title }}</strong></p>
                <p style="font-size: 12px; color: var(--color-secondary);">Target: {{ $milestone->due_date ? \Carbon\Carbon::parse($milestone->due_date)->format('d M Y') : 'No date' }} | Status: <span style="font-weight: bold; text-transform: capitalize;">{{ ucfirst($milestone->status) }}</span></p>
                <p style="font-style: italic; font-size: 12px;">{{ $milestone->description ?? 'Tidak ada deskripsi' }}</p>
            </div>
        @empty
            <p style="color: var(--color-secondary);">Belum ada linimasa yang ditetapkan.</p>
        @endforelse
    </div>

    <div class="section">
        <h2>Struktur Tim</h2>
        <div style="margin-bottom: 15px;">
            <p><strong>Pembuat Project:</strong> {{ $project->creator->name }}</p>
            <p><strong>Peran:</strong> <span style="color: var(--color-accent); font-weight: bold;">{{ $project->creator->role ?? 'Project Lead' }}</span></p>
        </div>
        
        <h3>Anggota Tim Inti</h3>
        <ul>
            @forelse($project->members as $member)
                <li>
                    <span>{{ $member->user->name }}</span>
                    <span style="font-style: italic; color: var(--color-secondary);">{{ $member->role }}</span>
                </li>
            @empty
                <li>Belum ada anggota tim yang terdaftar.</li>
            @endforelse
        </ul>
    </div>

    <div class="section">
        <h2>Progres Tugas</h2>
        @forelse($project->tasks as $task)
            <div style="margin-bottom: 10px;">
                <p><strong>{{ $task->title }}</strong> ({{ $task->progress }}%)</p>
                <div class="progress-bar-container" style="height: 8px;">
                    <div class="progress-bar" style="width: {{ $task->progress }}%;"></div>
                </div>
            </div>
        @empty
            <p style="color: var(--color-secondary);">Tidak ada tugas terdaftar.</p>
        @endforelse
    </div>
</body>
</html>