<style>
    body {
        font-family: 'Segoe UI', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    a {
        text-decoration: none;
    }

    li {
        list-style: none;
    }

    .wrapper {
        display: flex;
        min-height: 100vh;
    }

    #sidebar {
        height: 100vh;
        width: 220px;
        min-width: 220px;
        max-width: 300px;
        display: flex;
        flex-direction: column;
        background-color: #2c4b5f;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    #logo-btn {
        background-color: #2c4b5f;
        cursor: default;
        border: 0px;
    }

    #logo-btn i {
        padding: 0.75rem 0rem 0.75rem 0.75rem;
        font-size: 2.5rem;
        font-weight: 600;
        background-image: linear-gradient(90deg, #2c4b5f, #446c7c, #fff);
        background-clip: text;
        color: transparent;
    }

    .sidebar-logo {
        padding: 1rem;
        padding-bottom: 1%;
        font-size: 1.5rem;
        font-weight: 700;
        color: #e4e4e4;
        text-align: center;
    }

    .sidebar-nav {
        padding: 0rem 0rem;
        flex: 1 1 auto;
        border-top: 0.1px solid #517981;
        flex-wrap: wrap;
    }

    .sidebar-link {
        padding: 1rem;
        padding-left: 1.3rem;
        color: #89A0A8;
        display: flex;
        font-weight: 500;
        white-space: nowrap;
        transition: background-color 0.3s, color 0.3s;
    }

    .sidebar-link i {
        margin-right: 0.75rem;
    }

    .sidebar-link:hover {
        background-color: #446c7c;
        color: #fff;
    }

    .logout-btn {
        padding: 0.3rem;
        color: #89A0A8;
        display: flex;
        font-weight: 500;
        white-space: nowrap;
        cursor: pointer;
    }

    .logout-btn i {
        margin-right: 0.3rem;
    }

    .logout-btn:hover {
        color: #446c7c;
    }

    .user-profile {
        display: flex;
        padding: 0.75rem;
        padding-left: 0.5rem;
        align-items: center;
        color: #e4e4e4;
        font-weight: 500;
        border-top: 0.1px solid #517981;
    }

    .user-profile:hover {
        background-color: #446c7c;
    }
</style>

<div class="wrapper">
    <aside id="sidebar">
        <div class="d-flex">
            <div class="sidebar-logo">
                <span class="system">DEMO APP</span>
            </div>
        </div>
        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a href=" " class="sidebar-link">
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href=" " class="sidebar-link">
                    <span>Users</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href=" " class="sidebar-link">
                    <span>Genders</span>
                </a>
            </li>
        </ul>
    </aside>
</div>