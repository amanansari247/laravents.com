<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-6 col-md-3">
                        <ul class="list-unstyled mb-0">
                            <li><a href="{{ url('/c') }}">Conferences</a></li>
                            <li><a href="{{ url('/m') }}">Meetups</a></li>
                        </ul>
                    </div>

                    <div class="col-6 col-md-3">
                        <ul class="list-unstyled mb-0">
                            <li><a href="{{ url('/h') }}">Hackathons</a></li>
                            <li><a href="{{ url('/s') }}">Sponsors</a></li>
                        </ul>
                    </div>

                    <div class="col-6 col-md-3">
                        <ul class="list-unstyled mb-0">
                            <li><a href="https://tickets.laravents.com">Tickets</a></li>
                            <li><a href="https://larvis.laravents.com">Larvis</a></li>
                        </ul>
                    </div>

                    <div class="col-6 col-md-3">
                        <ul class="list-unstyled mb-0">
                            <li><a href="https://twitter.com/laraventscom">Twitter</a></li>
                            <li><a href="https://github.com/laravents">GitHub</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mt-4 mt-lg-0">
                Join & host Laravel conferences, hackathons and meetups around the world.
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row align-items-center flex-row-reverse">

            <div class="col-auto ml-lg-auto">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <ul class="list-inline list-inline-dots mb-0">
                            <li class="list-inline-item"><a href="{{ url('/imprint') }}">Imprint</a></li>
                            <li class="list-inline-item"><a href="{{ url('/privacy') }}">Privacy</a></li>
                        </ul>
                    </div>
                    <div class="col-auto">
                        <a href="https://paypal.me/florianwartner" class="btn btn-outline-primary btn-sm"><i class="fab fa-paypal"></i> Donate</a>
                    </div>
                    <div class="col-auto">
                        <a href="https://github.com/laravents/laravents.com" class="btn btn-outline-primary btn-sm">Source code</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-auto mt-3 mt-lg-0 text-center">
                Copyright © {{ date('Y') }} <a href="{{ url('/') }}">laravents.com</a>. Coded with <i class="far fa-heart"></i> by <a href="https://florianwartner.me" target="_blank">Florian "@fwartner" Wartner</a> All rights reserved.
            </div>
        </div>
    </div>
</footer>