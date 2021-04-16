@include('layouts.head')
@include('layouts.unesp_header')
@include('layouts.header')
 
<!-- Sobre content  -->
<main>
    <div class="container">
        <div class="row content-sobre">
            <div class="card">
                <div class="row">
                    <div class="col-12">
                        <h1>Sobre o PDI</h1>
                    </div>
                    <div class="col-12">
                        <p class="text-justify">
                            O Plano de Desenvolvimento Institucional-PDI 2021 - 2025 é o documento que orienta a
                            universidade em suas ações e desenvolvimento durante o período de cinco anos. Apresenta as
                            estratégias a serem adotadas, estabelece objetivos e metas, busca consolidar diretrizes,
                            identidade e princípios comuns a todos. Articula-se, de forma direta, com o Projeto
                            Pedagógico Institucional-PPI, estruturando condições para sua adoção e desenvolvimento ao
                            longo do tempo.
                        </p>
                        <p class="text-justify">
                            Está alinhado com Metas e Estratégias do Plano Nacional de Educação e do ponto de vista
                            global busca alinhamento com a Agenda 2030 para o Desenvolvimento Sustentável da
                            Organização Nações Unidas, através dos 17 ODS – Objetivos para o Desenvolvimento
                            Sustentável. Integra o processo avaliativo da universidade junto ao MEC e é o documento mais
                            importante para informar a sociedade sobre o que fazemos e o que pretendemos alcançar.
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h1>Missão</h1>
                    </div>
                    <div class="col-12">
                        <p class="text-justify">
                            Formar profissionais cidadãos esclarecidos, críticos e tecnicamente habilitados, nas mais diversas áreas, preparados para transformar a realidade e desenvolver o país, na construção de uma sociedade mais justa, democrática, plural e sustentável, por meio de ensino, pesquisa, extensão, cultura, inovação e assistência, atuando como universidade pública, gratuita, laica e socialmente referenciada.
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h1>Visão</h1>
                    </div>
                    <div class="col-12">
                        <p class="text-justify">
                            A Unifesp pretende ser  cada vez mais reconhecida pela Sociedade como uma Universidade Pública:
                        </p>
                        <ul>
                            <li>Democrática: plural, inclusiva e solidária.</li>
                            <li>Autônoma: crítica,  ousada, independente, com autonomia intelectual e científica.</li>
                            <li>Transformadora: questionadora, criativa, cooperativa e indutora do desenvolvimento com justiça social e ambiental.</li>
                            <li>Comunicativa: produtora e difusora do conhecimento socialmente referenciado, na defesa da vida e da educação pública, combatendo as desigualdades e o racismo estrutural.</li> 
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h1>Valores</h1>
                    </div>
                    <div class="col-12">
                        <div class="select-group">
                            @for ($i=0; $i <= 10; $i++)
                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                <option selected>1. Ética, integridade e respeito à coisa pública </option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="btn btn-primary">
                            <span>
                                Baixar PDI
                            </span>
                            <span>
                                formato.pdf
                            </span>
                        </div>
                        <div class="btn btn-primary">
                            <span>
                                Baixar PPI
                            </span>
                            <span>
                                formato.pdf
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main> 
<!-- #end Sobnre content  -->

@include('layouts.footer')