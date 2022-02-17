@extends('layouts.app')

@section('content')
    <div class="flex flex-row mx-5 my-3">
        <div class="w-full">
            <div class="card">
                <div class="card-header">
                    Willkommen bei meinem kleinen Wiki &#128512;
                </div>
                <div class="card-body">
                    <p>Es freut mich Euch hier begrüßen zu dürfen!</p>
                    <p>Ich versuche hier meine Erfahrungen und mein Wissen festzuhalten, damit jeder - dem ich die Berechtigung gebe &#128521; - davon profitieren kann.</p>
                    <p>Zuerst mal - die Seite ist eine reine Informationsseite, sprich ich werde damit keinerlei Design-Preise gewinnen und dies ist auch nicht mein Ziel.</p>
                    <p>Das Wiki umfasst drei Bereiche:</p>
                    <ul>
                        <li>Finanzen</li>
                        <li>IT</li>
                        <li>Business</li>
                    </ul>
                    <p>
                        Jeder Bereich hat dann noch weitere Unterteilungen.
                        Diese sind auf den jeweiligen Seiten direkt auswählbar.
                    </p>
                    <p>
                        Es kann durchaus sein, dass Ihr nicht alle Bereiche einsehen könnt.
                        Dies hängt von Euren Berechtigungen ab.
                        Wenn Ihr Interesse an einem Bereich habt, den Ihr nicht seht, sagt einfach Bescheid. &#128521;
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-row mx-5 my-3">
        <div class="w-full">
            <div class="card">
                <div class="card-header">
                    Disclaimer
                </div>
                <div class="card-body">
                    <p>Auch wenn ich plane nur Freunden Zugriff auf das Wiki zu geben, muss ich das hier direkt anbringen - vor allem für den Finanzbereich. &#128519;</p>
                    <p>
                        Dieses Wiki stellt keine Finanzberatung dar, die Informationen die Ihr hier findet, sind zusammengetragen aus verschiedensten Internet-Quellen.<br />
                        Jede Quelle ist angegeben ( im jeweiligen Bereich in dem Untermenü 'Quellen').
                    </p>
                    <p>
                        Vergesst nie - die meisten Finanzthemen, die ich hier anspreche, werden alle als hochspekulativ angesehen.<br />
                        Der Aktienmarkt ist keine Spielwiese - man muss sich immer vorher detailliert Informieren und auch dann kann es in die Hose gehen.
                    </p>
                    <p>
                        Auf einigen Seiten werdet Ihr auch zu lesen bekommen, wie ich meine persönlichen Finanzen organisiert habe.
                        Diese Informationen sind jeweils farblich hervorgehoben und kursiv geschrieben.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
