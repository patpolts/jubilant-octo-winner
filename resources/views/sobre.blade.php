@include('layouts.head')
@include('layouts.unesp_header')
@include('layouts.header')
 
<!-- Sobre content  -->
<main>
    <div class="content-sobre">
        <div class="container  border-ligt rounded">
            <div class="row">
                <div class="card">
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
                        <p>
                            Está alinhado com Metas e Estratégias do Plano Nacional de Educação e do ponto de vista
                            global busca alinhamento com a Agenda 2030 para o Desenvolvimento Sustentável da
                            Organização Nações Unidas, através dos 17 ODS – Objetivos para o Desenvolvimento
                            Sustentável. Integra o processo avaliativo da universidade junto ao MEC e é o documento mais
                            importante para informar a sociedade sobre o que fazemos e o que pretendemos alcançar.
                        </p>
                    </div>
                    <div class="col-12">
                        <h1>Missão</h1>
                    </div>
                    <div class="col-12">
                        <p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</p>
                    </div>
                    <div class="col-12">
                        <h1>Visão</h1>
                    </div>
                    <div class="col-12">
                        <p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</p>
                    </div>
                    <div class="col-12">
                        <h1>Valores</h1>
                    </div>
                    <div class="col-12">
                        <div class="select-group">
                            @for ($i=0; $i <= 10; $i++)
                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            @endfor
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="button" class="btn btn-primary">Baixar PDI</button>
                        <button type="button" class="btn btn-primary">Baixar PPI</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main> 
<!-- #end Sobnre content  -->

@include('layouts.footer')