<div class="container-fluid position-fixed top-0 start-0 w-100 text-white bg-dark text-center py-auto d-flex align-items-center justify-content-center gap-1"
     style="z-index: 1000 ;font-size: 12px; height: 1.5rem">
    You are editing
    <form action="<?= route_to("session.lang") ?>?url=<?= current_url() ?>" method="post" id="langsel">
        <select name="lang" id="lang"
                style="background-color: #00964c"
                class="border-top-0 border-bottom-0 text-white fw-semibold"
                onchange="document.getElementById('langsel').submit()">
            <option value="EN" <?= currLang() == "EN" ? 'selected' : '' ?>><?= labelLang("EN") ?> (EN)</option>
            <option value="ID" <?= currLang() == "ID" ? 'selected' : '' ?>><?= labelLang("ID") ?> (ID)</option>
            <option value="CN" <?= currLang() == "CN" ? 'selected' : '' ?>><?= labelLang("CN") ?> (CN)</option>
        </select>
    </form>
    for PT. Sembilan Tiga Perdana website
</div>
<nav class="navbar mt-4 navbar-expand-lg navbar-light bg-light shadow-sm d-flex flex-column">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?= route_to("dashboard.landing.index") ?>">
                        <?= call("MENU_HOME", "Home") ?>
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        <?= call("MENU_ABOUT", "About") ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="<?= route_to("dashboard.about.index") ?>">
                                Edit "About Us" Page
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?= route_to("dashboard.about.bnm") ?>">
                                Edit "Board and Management" Page
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?= route_to("dashboard.about.cg") ?>">
                                Edit "Corporate Governance" Page
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?= route_to("dashboard.about.oc") ?>">
                                Edit "Our Code" Page
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= route_to("dashboard.what-we-do.index") ?>">
                        <?= call("MENU_WHATWEDO", "What We Do") ?>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= route_to("dashboard.partnerships.index") ?>">
                        <?= call("MENU_PARTNERSHIPS", "Partnerships") ?>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= route_to("dashboard.sustainability.index") ?>">
                        <?= call("MENU_SUSTAINABILITY", "Sustainability") ?>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= route_to("dashboard.career.index") ?>">
                        <?= call("MENU_CAREER", "Career") ?>
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        <?= call("MENU_MEDIA", "Media") ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="<?= route_to("dashboard.media.index") ?>">
                                Edit "Media" Page
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?= route_to("dashboard.media.gallery") ?>">
                                Edit "Gallery" Page
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?= route_to("dashboard.media.news") ?>">
                                Edit "News" Page
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?= route_to("dashboard.media.press") ?>">
                                Edit "Press" Page
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        <?= call("MENU_CONTACTUS", "Contact Us") ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="<?= route_to("dashboard.contact-us.index") ?>">
                                Edit "Contact Us" Page
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?= route_to("dashboard.contact-us.post") ?>">
                                Edit "After Submit" Page
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-outline-danger"
                       href="<?= route_to("auth.logout") ?>"
                    >
                        Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>