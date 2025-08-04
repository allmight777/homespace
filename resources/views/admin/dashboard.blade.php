<x-app-layout>
    <x-slot name="header">
        <h2 class="header-title">
            Dashboard Admin
        </h2>
    </x-slot>

    <style>
        .header-title {
            font-weight: 700;
            font-size: 2rem;
            color: #1D4ED8; /* Bleu Tailwind blue-700 */
            margin-bottom: 1rem;
        }

        .dashboard-container {
            max-width: 900px;
            margin: 3rem auto;
            padding: 2rem;
            background-color: #DBEAFE; /* Bleu clair */
            border: 1px solid #3B82F6; /* Bleu plus vif */
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
            color: #1E3A8A; /* Bleu foncé */
            font-family: Arial, sans-serif;
        }

        .dashboard-container h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .dashboard-container p {
            font-size: 1.125rem;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .dashboard-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-top: 1rem;
        }

        .btn-manage {
            background-color: #2563EB; /* blue-600 */
            color: white;
            padding: 1rem 2rem;
            font-weight: 600;
            font-size: 1.125rem;
            border-radius: 0.75rem;
            text-decoration: none;
            display: inline-block;
            box-shadow: 0 4px 10px rgba(37, 99, 235, 0.5);
            transition: background-color 0.3s ease;
        }

        .btn-manage:hover {
            background-color: #1D4ED8; /* blue-700 */
            box-shadow: 0 6px 15px rgba(29, 78, 216, 0.7);
            color: #fcfdff;
        }

        @media (max-width: 768px) {
            .dashboard-buttons {
                flex-direction: column;
                align-items: stretch;
            }

            .btn-manage {
                width: 100%;
                text-align: center;
            }
        }
    </style>

    <div class="dashboard-container">
        <h3>Bienvenue dans le dashboard admin</h3>

        <p>
            Ici, vous pouvez gérer facilement les logements et suivre leur statut.
        </p>

        <div class="dashboard-buttons">
            <a href="{{ route('admin.users.index') }}" class="btn-manage">
                Gérer les utilisateurs
            </a>

            <a href="{{ route('admin.logements.index') }}" class="btn-manage">
                Gérer les logements
            </a>

            <a href="{{ route('admin.paiements.index') }}" class="btn-manage">
                Gérer les demandes
            </a>
        </div>
    </div>
</x-app-layout>
