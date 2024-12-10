<div class="sidebar">
    <h2>TransportHub</h2>
    <ul>
        <li><a href="<?= base_url('/Home') ?>" >Home</a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" id="offersDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                My Offers
            </a>
            <ul class="dropdown-menu" aria-labelledby="offersDropdown">
                <li><a class="dropdown-item" href="<?= base_url('/MyOffers#pending-offers') ?>">Pending Offers</a>
                </li>
                <li><a class="dropdown-item" href="<?= base_url('/MyOffers#posted-offers') ?>">Posted Offers</a>
                </li>
            </ul>
        </li>
        <li><a href="<?= base_url('/OfferForm') ?>">Post an Offer</a></li>
        <li><a href="#">Logout</a></li>
    </ul>
</div>