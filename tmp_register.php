<?php /* Template Name: Register Page */ ?>
<?php get_header(); ?>
<?php $tmp_dir = get_template_directory_uri() . "/images/";
$idxc=get_the_ID();
?>

<div class="container">
    <div class="row">
        <div class="col-12">


<form action="/wp-admin/admin-ajax.php" method="post" style="margin-bottom: 40px">
    <input type="hidden" name="action" value="misha">
    <div class="reg-grd">
    <div class="reg-itm">
        <label>ФИО родителя</label>
    <input type="text" name="name" required>
    </div><div class="reg-itm">
    <label>Адрес e-mail</label>
    <input type="email" name="email" required>
        </div><div class="reg-itm">
    <label>Номер телефона в международном формате (+7 ХХХ ХХХ ХХ ХХ)</label>
    <input type="tel" name="phone" required>
        </div><div class="reg-itm">
    <label>Регион</label>
    <select name="region" required>
        <option></option>
        <option>	Акмолинская область</option>
        <option>	Актюбинская область</option>
        <option>	Алматинская область</option>
        <option>	Алматы</option>
        <option>	Астана</option>
        <option>	Атырауская область</option>
        <option>	Восточно-Казахстанская область</option>
        <option>	Жамбылская область</option>
        <option>	Западно-Казахстанская область</option>
        <option>	Карагандинская область</option>
        <option>	Костанайская область</option>
        <option>	Кызылординская область</option>
        <option>	Мангистауская область</option>
        <option>	Павлодарская область</option>
        <option>	Северо-Казахстанская область</option>
        <option>	Туркестанская область (ЮКО)</option>
        <option>	Шымкент</option>
    </select>
        </div><div class="reg-itm">
    <label>Количество детей с диабетом</label>
    <input id="childcnt" oninput="chng()" name="countchildren" type="number" required>
        </div>
    </div>

    <div id="xlayout"></div>

    <input type="submit" value="Сохранить">
</form>

            <script>
                function chng() {
                    $("#xlayout").empty();

                    for (let i=0; i<$("#childcnt").val(); i++) {
                        var nunber=i+1;
                        var str = '<h2>Ребенок '+nunber+'</h2><div class="reg-grd">\n' +
                            '        <div class="reg-itm">\n' +
                            '    <label>Возраст ребенка с сахарным диабетом 1 типа (T1D)</label>\n' +
                            '    <input name="vozrastchild'+nunber+'" type="number" max="80" min="1" value="1">\n' +
                            '        </div><div class="reg-itm">\n' +
                            '    <label>Возраст, при котором ребенок заболел</label>\n' +
                            '    <input name="agechild'+nunber+'" type="number" max="80" min="1" value="1">\n' +
                            '        </div><div class="reg-itm">\n' +
                            '    <label>Стаж диабета</label>\n' +
                            '    <input name="stagh'+nunber+'" type="number" max="80" min="1" value="1">\n' +
                            '        </div><div class="reg-itm">\n' +
                            '    <label>Наличие инвалидности</label>\n' +
                            '    <select name="invalid'+nunber+'">\n' +
                            '        <option value="1">Да</option>\n' +
                            '        <option value="0">Нет</option>\n' +
                            '    </select>\n' +
                            '        </div><div class="reg-itm">\n' +
                            '    <label>Вид инсулинотерапии</label>\n' +
                            '    <select name="vid'+nunber+'">\n' +
                            '        <option>Помповая инсулинотерапия</option>\n' +
                            '        <option>Шприц-ручки</option>\n' +
                            '        <option>Шприцы</option>\n' +
                            '    </select>\n' +
                            '        </div><div class="reg-itm">\n' +
                            '    <label>Контроль гликемии</label>\n' +
                            '    <select name="control'+nunber+'">\n' +
                            '        <option>Глюкометр</option>\n' +
                            '        <option>Глюкометр+Мониторинг</option>\n' +
                            '        <option>Мониторинг всегда</option>\n' +
                            '    </select>\n' +
                            '        </div><div class="reg-itm">\n' +
                            '    <label>Используемый глюкометр</label>\n' +
                            '    <select name="glukometr'+nunber+'">\n' +
                            '        <option>AT-Care</option>\n' +
                            '        <option>CodeFree</option>\n' +
                            '        <option>Другой</option>\n' +
                            '        </select>\n' +
                            '        </div><div class="reg-itm">\n' +
                            '    <label>Используемые инсулины ультракороткого действия</label>\n' +
                            '    <select name="shortinsulin'+nunber+'">\n' +
                            '        <option>Апидра, Apidra</option>\n' +
                            '        <option>Хумалог, Humalog</option>\n' +
                            '        <option>Новорапид, NovoRapid</option>\n' +
                            '        <option>Fiasp, Фиасп</option>\n' +
                            '        <option>Возулим Р</option>\n' +
                            '        <option>Insugen — R Refil</option>\n' +
                            '        <option>Afrezza</option>\n' +
                            '        <option>Росинсулин Р</option>\n' +
                            '        <option>Рапилин</option>\n' +
                            '        <option>Люмжев</option>\n' +
                            '        </select>\n' +
                            '        </div><div class="reg-itm">\n' +
                            '    <label>Используемые инсулины пролонгированного действия</label>\n' +
                            '    <select name="prolonginsulin'+nunber+'">\n' +
                            '        <option>Левемир, Levemir</option>\n' +
                            '        <option>Туджео Солостар, Toujeo SoloStar</option>\n' +
                            '        <option>РинГлар</option>\n' +
                            '        <option>Лантус, Lantus</option>\n' +
                            '        <option>Тресиба, Tresiba</option>\n' +
                            '        <option>BASALOG</option>\n' +
                            '        <option>Басаглар, Basaglar</option>\n' +
                            '        <option>Возулим Н</option>\n' +
                            '        <option>Insugen — 30/70 Refil</option>\n' +
                            '        <option>Инсуман Базал ГТ, Insuman Basal GT</option>\n' +
                            '        <option>Протафан, Protaphane HM</option>\n' +
                            '        <option>Хумулин Л, Humulin L</option>\n' +
                            '        <option>Ультраленте MC, Ultralente MC</option>\n' +
                            '        <option>Ультратард, Ultratard HM</option>\n' +
                            '        <option>Монодар лонг, Monodar long</option>\n' +
                            '        <option>Монодар ультралонг</option>\n' +
                            '        <option>Суперленте СПП</option>\n' +
                            '        <option>Ультраленте</option>\n' +
                            '        </select>\n' +
                            '        </div><div class="reg-itm">\n' +
                            '            <label>Наличие осложнений у ребенка</label>\n' +
                            '    <select name="osloghnenie'+nunber+'">\n' +
                            '        <option>Диабетическая ретинопатия</option>\n' +
                            '        <option>Диабетическая нефропатия</option>\n' +
                            '        <option>Диабетическая нейропатия</option>\n' +
                            '        <option>Макрососудистые осложнения</option>\n' +
                            '        <option>Кардиомиопатия</option>\n' +
                            '        <option>Инфекция</option>\n' +
                            '        <option>Неалкогольная жировая болезнь печени (НАЖБП)</option>\n' +
                            '        <option>Другие осложнения</option>\n' +
                            '        <option>Нет осложнений</option>\n' +
                            '        </select>\n' +
                            '        </div>\n' +
                            '    </div>';


                        $("#xlayout").append(str);
                    }
                    $("#xlayout").show();
                }
            </script>

        </div>
    </div>
</div>


<?php get_footer(); ?>
