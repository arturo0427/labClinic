<?php

use Illuminate\Database\Seeder;
use App\Grupos_examen;
use App\Grupos_detalle_tipoExamen;
use Illuminate\Support\Str;

class GruposExamenesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Gripos de tipos de examenes que tiene el laboratorio
        Grupos_examen::create(['name' => 'Hematológico']);
        Grupos_examen::create(['name' => 'Hemostasia y Coagulación']);
        Grupos_examen::create(['name' => 'Bioquímico y Enzimático']);
        Grupos_examen::create(['name' => 'Serología']);
        Grupos_examen::create(['name' => 'Orina']);
        Grupos_examen::create(['name' => 'Heces']);
        Grupos_examen::create(['name' => 'Bacteriología y Micología']);
        Grupos_examen::create(['name' => 'Hormonales']);
        Grupos_examen::create(['name' => 'Electrolitos']);
        Grupos_examen::create(['name' => 'M. Tumorales']);
        Grupos_examen::create(['name' => 'Inmunomicrobiología']);
        Grupos_examen::create(['name' => 'Pruebas de ADN']);
        Grupos_examen::create(['name' => 'Histopatología']);

//        Tipos de examenes que existen en el laboratorio
//        Hematológico
        Grupos_detalle_tipoExamen::create(['name' => 'Biometría Hemática', 'grupos_id' => 1, 'slug' => Str::slug('Biometría Hemática', '_'), 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Hematocrito', 'grupos_id' => 1, 'slug' => Str::slug('Hematocrito', '_'), 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Hemoglobina', 'grupos_id' => 1, 'slug' => Str::slug('Hemoglobina', '_'), 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Contaje de Hematíes', 'grupos_id' => 1, 'slug' => Str::slug('Contaje de Hematíes', '_'), 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Contaje de Leucocitos', 'grupos_id' => 1, 'slug' => Str::slug('Contaje de Leucocitos', '_'), 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Indices Hemáticos', 'grupos_id' => 1, 'slug' => Str::slug('Indices Hemáticos', '_'), 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Sedimentación', 'grupos_id' => 1, 'slug' => Str::slug('Sedimentación', '_'), 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Fórmula Leucocitaria', 'grupos_id' => 1, 'slug' => Str::slug('Fórmula Leucocitaria', '_'), 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Grupo y Factor', 'grupos_id' => 1, 'slug' => Str::slug('Grupo y Factor', '_'), 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Reticulocitos', 'grupos_id' => 1, 'slug' => Str::slug('Reticulocitos', '_'), 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Drepanocitos', 'grupos_id' => 1, 'slug' => Str::slug('Drepanocitos', '_'), 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Hematozoario', 'grupos_id' => 1, 'slug' => Str::slug('Hematozoario', '_'), 'consumo' => 2]);

//        Hemostasia y coagulación
        Grupos_detalle_tipoExamen::create(['name' => 'Plaquetas', 'grupos_id' => 2, 'slug' => Str::slug('plaquetas', '_'), 'consumo' => 2, 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'INR', 'grupos_id' => 2, 'slug' => Str::slug('INR', '_'), 'consumo' => 2, 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Tiempo de Coagulación', 'grupos_id' => 2, 'slug' => Str::slug('Tiempo de Coagulación', '_'), 'consumo' => 2, 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Tiempo de Sangría', 'grupos_id' => 2, 'slug' => Str::slug('Tiempo de Sangría', '_'), 'consumo' => 2, 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'TP', 'grupos_id' => 2, 'slug' => Str::slug('TP', '_'), 'consumo' => 2, 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'TTP', 'grupos_id' => 2, 'slug' => Str::slug('TTP', '_'), 'consumo' => 2, 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Coombs Directo', 'grupos_id' => 2, 'slug' => Str::slug('Coombs Directo', '_'), 'consumo' => 2, 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Coombs Indirecto', 'grupos_id' => 2, 'slug' => Str::slug('Coombs Indirecto', '_'), 'consumo' => 2, 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Fibrinógeno', 'grupos_id' => 2, 'slug' => Str::slug('Fibrinógeno', '_'), 'consumo' => 2, 'consumo' => 2]);

//        Bioquímico y enzimático
        Grupos_detalle_tipoExamen::create(['name' => 'Glucosa', 'grupos_id' => 3, 'slug' => Str::slug('Glucosa', '_'), 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Glucosa Postprandial', 'grupos_id' => 3, 'slug' => Str::slug('Glucosa Postprandial', '_'), 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Curva de Glucosa', 'grupos_id' => 3, 'slug' => Str::slug('Curva de Glucosa', '_'), 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Urea', 'grupos_id' => 3, 'slug' => Str::slug('Urea', '_'), 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Ácido Urico', 'grupos_id' => 3, 'slug' => Str::slug('Ácido Urico', '_'), 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Creatinina', 'grupos_id' => 3, 'slug' => Str::slug('Creatinina', '_'), 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Colinesterasa', 'grupos_id' => 3, 'slug' => Str::slug('Colinesterasa', '_'), 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Bilirrubina (D-I-T)', 'grupos_id' => 3, 'slug' => Str::slug('Bilirrubina (D-I-T)', '_'), 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'AST (TGO)', 'grupos_id' => 3, 'slug' => Str::slug('AST (TGO)', '_'), 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'ALT (TGP)', 'grupos_id' => 3, 'slug' => Str::slug('ALT (TGP)', '_'), 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Hemoglobina Glicosilada Hb Alc', 'grupos_id' => 3, 'slug' => Str::slug('Hemoglobina Glicosilada Hb Alc', '_'), 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Proteínas Totales', 'grupos_id' => 3, 'slug' => Str::slug('Proteínas Totales', '_'), 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Albúmina', 'grupos_id' => 3, 'slug' => Str::slug('Albúmina', '_'), 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Globulinas', 'grupos_id' => 3, 'slug' => Str::slug('Globulinas', '_'), 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Lípidos Totales', 'grupos_id' => 3, 'slug' => Str::slug('Lípidos Totales', '_'), 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Colesterol', 'grupos_id' => 3, 'slug' => Str::slug('Colesterol', '_'), 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'HDL', 'grupos_id' => 3, 'slug' => Str::slug('HDL', '_'),  'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'LDL', 'grupos_id' => 3, 'slug' => Str::slug('LDL', '_'), 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Triglicéridos', 'grupos_id' => 3, 'slug' => Str::slug('Triglicéridos', '_'), 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Amilasa', 'grupos_id' => 3, 'slug' => Str::slug('Amilasa', '_'), 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Lipasa', 'grupos_id' => 3, 'slug' => Str::slug('Lipasa', '_'), 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Fosfatas Ácida', 'grupos_id' => 3, 'slug' => Str::slug('Fosfatas Ácida', '_'), 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Fosfatasa Alcalina', 'grupos_id' => 3, 'slug' => Str::slug('Fosfatasa Alcalina', '_'), 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Hierro Sérico', 'grupos_id' => 3, 'slug' => Str::slug('Hierro Sérico', '_'), 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Procalcitonina', 'grupos_id' => 3, 'slug' => Str::slug('Procalcitonina', '_'), 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Insulina', 'grupos_id' => 3, 'slug' => Str::slug('Insulina', '_'), 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Troponina', 'grupos_id' => 3, 'slug' => Str::slug('Troponina', '_'), 'consumo' => 2]);

//        Serología
        Grupos_detalle_tipoExamen::create(['name' => 'ASTO', 'grupos_id' => 4, 'slug' => Str::slug('ASTO', '_'), 'consumo' => 2, 'consumo' => 2, 'consumo' => 2, 'consumo' => 2, 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'PCR (Proteína C. Reactiva)', 'grupos_id' => 4, 'slug' => Str::slug('PCR (Proteína C. Reactiva)', '_'), 'consumo' => 2, 'consumo' => 2, 'consumo' => 2, 'consumo' => 2, 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Factor Reumatoide', 'grupos_id' => 4, 'slug' => Str::slug('Factor Reumatoide', '_'), 'consumo' => 2, 'consumo' => 2, 'consumo' => 2, 'consumo' => 2, 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'VRDL', 'grupos_id' => 4, 'slug' => Str::slug('VRDL', '_'), 'consumo' => 2, 'consumo' => 2, 'consumo' => 2, 'consumo' => 2, 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'VIH (SIDA)', 'grupos_id' => 4, 'slug' => Str::slug('VIH (SIDA)', '_'), 'consumo' => 2, 'consumo' => 2, 'consumo' => 2, 'consumo' => 2, 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Aglutinaciones Febriles', 'grupos_id' => 4, 'slug' => Str::slug('Aglutinaciones Febriles', '_'), 'consumo' => 2, 'consumo' => 2, 'consumo' => 2, 'consumo' => 2, 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'H. Pylori (Serología)', 'grupos_id' => 4, 'slug' => Str::slug('H. Pylori (Serología)', '_'), 'consumo' => 2, 'consumo' => 2, 'consumo' => 2, 'consumo' => 2, 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Hepatitis A-B-C', 'grupos_id' => 4, 'slug' => Str::slug('Hepatitis A-B-C', '_'), 'consumo' => 2, 'consumo' => 2, 'consumo' => 2, 'consumo' => 2, 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'F.T.A ABS', 'grupos_id' => 4, 'slug' => Str::slug('F.T.A ABS', '_'), 'consumo' => 2, 'consumo' => 2, 'consumo' => 2, 'consumo' => 2, 'consumo' => 2]);

//        Orina
        Grupos_detalle_tipoExamen::create(['name' => 'Elemental y Microscópico', 'grupos_id' => 5, 'slug' => Str::slug('Elemental y Microscópico', '_'), 'consumo' => 2, 'consumo' => 2, 'consumo' => 2, 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Gram Sedimento', 'grupos_id' => 5, 'slug' => Str::slug('Gram Sedimento', '_'), 'consumo' => 2, 'consumo' => 2, 'consumo' => 2, 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Gram Gota Fresca (GF)', 'grupos_id' => 5, 'slug' => Str::slug('Gram Gota Fresca (GF)', '_'), 'consumo' => 2, 'consumo' => 2, 'consumo' => 2, 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Proteinuria 24H', 'grupos_id' => 5, 'slug' => Str::slug('Proteinuria 24H', '_'), 'consumo' => 2, 'consumo' => 2, 'consumo' => 2, 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Micro albuminuria', 'grupos_id' => 5, 'slug' => Str::slug('Micro albuminuria', '_'), 'consumo' => 2, 'consumo' => 2, 'consumo' => 2, 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Drogas de abuso', 'grupos_id' => 5, 'slug' => Str::slug('Drogas de abuso', '_'), 'consumo' => 2, 'consumo' => 2, 'consumo' => 2, 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Urocultivo y antibiograma', 'grupos_id' => 5, 'slug' => Str::slug('Urocultivo y antibiograma', '_'), 'consumo' => 2, 'consumo' => 2, 'consumo' => 2, 'consumo' => 2]);

//        Heces
        Grupos_detalle_tipoExamen::create(['name' => 'Coproparasitario', 'grupos_id' => 6, 'slug' => Str::slug('Coproparasitario', '_'), 'consumo' => 2, 'consumo' => 2, 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Coprológico', 'grupos_id' => 6, 'slug' => Str::slug('Coprológico', '_'), 'consumo' => 2, 'consumo' => 2, 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Polimorfo nucleares', 'grupos_id' => 6, 'slug' => Str::slug('Polimorfo nucleares', '_'), 'consumo' => 2, 'consumo' => 2, 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Sangre Oculta', 'grupos_id' => 6, 'slug' => Str::slug('Sangre Oculta', '_'), 'consumo' => 2, 'consumo' => 2, 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Rotavirus / Adenovirus', 'grupos_id' => 6, 'slug' => Str::slug('Rotavirus / Adenovirus', '_'), 'consumo' => 2, 'consumo' => 2, 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'H. Pylori (Heces)', 'grupos_id' => 6, 'slug' => Str::slug('H. Pylori (Heces)', '_'), 'consumo' => 2, 'consumo' => 2, 'consumo' => 2]);

//        Bacteriología y Micología
        Grupos_detalle_tipoExamen::create(['name' => 'Fresco', 'grupos_id' => 7, 'slug' => Str::slug('Fresco', '_'), 'consumo' => 2, 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Gram', 'grupos_id' => 7, 'slug' => Str::slug('Gram', '_'), 'consumo' => 2, 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Ziehl', 'grupos_id' => 7, 'slug' => Str::slug('Ziehl', '_'), 'consumo' => 2, 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'KOH (Bacteriología y Micología)', 'grupos_id' => 7, 'slug' => Str::slug('KOH (Bacteriología y Micología)', '_'), 'consumo' => 2, 'consumo' => 2]);

//        Hormonales
        Grupos_detalle_tipoExamen::create(['name' => 'T3', 'grupos_id' => 8, 'slug' => Str::slug('T3', '_'), 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'T4', 'grupos_id' => 8, 'slug' => Str::slug('T4', '_'), 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'TSH', 'grupos_id' => 8, 'slug' => Str::slug('TSH', '_'), 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'HCG (Test embarazo)', 'grupos_id' => 8, 'slug' => Str::slug('HCG (Test embarazo)', '_'), 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'HCG Cuantitativa', 'grupos_id' => 8, 'slug' => Str::slug('HCG Cuantitativa', '_'), 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Hormona de Crecimiento', 'grupos_id' => 8, 'slug' => Str::slug('Hormona de Crecimiento', '_'), 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'FSH', 'grupos_id' => 8, 'slug' => Str::slug('FSH', '_'), 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Testosterona', 'grupos_id' => 8, 'slug' => Str::slug('Testosterona', '_'), 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Progesterona', 'grupos_id' => 8, 'slug' => Str::slug('Progesterona', '_'), 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Prolactina', 'grupos_id' => 8, 'slug' => Str::slug('Prolactina', '_'), 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Estradiol', 'grupos_id' => 8, 'slug' => Str::slug('Estradiol', '_'), 'consumo' => 2]);

//        Electrolitos
        Grupos_detalle_tipoExamen::create(['name' => 'Sodio', 'grupos_id' => 9, 'slug' => Str::slug('Sodio', '_'), 'consumo' => 2, 'consumo' => 2, 'consumo' => 2, 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Potasio', 'grupos_id' => 9, 'slug' => Str::slug('Potasio', '_'), 'consumo' => 2, 'consumo' => 2, 'consumo' => 2, 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Calcio', 'grupos_id' => 9, 'slug' => Str::slug('Calcio', '_'), 'consumo' => 2, 'consumo' => 2, 'consumo' => 2, 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Magnesio', 'grupos_id' => 9, 'slug' => Str::slug('Magnesio', '_'), 'consumo' => 2, 'consumo' => 2, 'consumo' => 2, 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Fósforo', 'grupos_id' => 9, 'slug' => Str::slug('Fósforo', '_'), 'consumo' => 2, 'consumo' => 2, 'consumo' => 2, 'consumo' => 2]);

//        M. Tumorales
        Grupos_detalle_tipoExamen::create(['name' => 'PSA', 'grupos_id' => 10, 'slug' => Str::slug('PSA', '_'), 'consumo' => 2, 'consumo' => 2, 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'PSA Libre', 'grupos_id' => 10, 'slug' => Str::slug('PSA Libre', '_'), 'consumo' => 2, 'consumo' => 2, 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'CEA', 'grupos_id' => 10, 'slug' => Str::slug('CEA', '_'), 'consumo' => 2, 'consumo' => 2, 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'CA 125', 'grupos_id' => 10, 'slug' => Str::slug('CA 125', '_'), 'consumo' => 2, 'consumo' => 2, 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'CA 19-9', 'grupos_id' => 10, 'slug' => Str::slug('CA 19-9', '_'), 'consumo' => 2, 'consumo' => 2, 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'CA-15-3', 'grupos_id' => 10, 'slug' => Str::slug('CA-15-3', '_'), 'consumo' => 2, 'consumo' => 2, 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'CA72-4', 'grupos_id' => 10, 'slug' => Str::slug('CA72-4', '_'), 'consumo' => 2, 'consumo' => 2, 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'A.F.P-4', 'grupos_id' => 10, 'slug' => Str::slug('A.F.P-4', '_'), 'consumo' => 2, 'consumo' => 2, 'consumo' => 2]);

//        Inmunomicrobiología
        Grupos_detalle_tipoExamen::create(['name' => 'Ac. Chlamidya (IgG IgM)', 'grupos_id' => 11, 'slug' => Str::slug('Ac. Chlamidya (IgG IgM)', '_'), 'consumo' => 2, 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Ac. Herpes I (IgG IgM)', 'grupos_id' => 11, 'slug' => Str::slug('Ac. Herpes I (IgG IgM)', '_'), 'consumo' => 2, 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Ac. Herpes II (IgG IgM)', 'grupos_id' => 11, 'slug' => Str::slug('Ac. Herpes II (IgG IgM)', '_'), 'consumo' => 2, 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Rubeola', 'grupos_id' => 11, 'slug' => Str::slug('Rubeola', '_'), 'consumo' => 2, 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Toxoplasma', 'grupos_id' => 11, 'slug' => Str::slug('Toxoplasma', '_'), 'consumo' => 2, 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Citomegalovirus', 'grupos_id' => 11, 'slug' => Str::slug('Citomegalovirus', '_'), 'consumo' => 2, 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'KOH (Inmunomicrobiología)', 'grupos_id' => 11, 'slug' => Str::slug('KOH (Inmunomicrobiología)', '_'), 'consumo' => 2, 'consumo' => 2]);

//        Pruebas de ADN
        Grupos_detalle_tipoExamen::create(['name' => 'Paternidad Estándar', 'grupos_id' => 12, 'slug' => Str::slug('Paternidad Estándar', '_'), 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Paternidad Prenatal', 'grupos_id' => 12, 'slug' => Str::slug('Paternidad Prenatal', '_'), 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'De Orígenes', 'grupos_id' => 12, 'slug' => Str::slug('De Orígenes', '_'), 'consumo' => 2]);

//        Histopatología
        Grupos_detalle_tipoExamen::create(['name' => 'Papanicolaou', 'grupos_id' => 13, 'slug' => Str::slug('Papanicolaou', '_'), 'consumo' => 2]);
        Grupos_detalle_tipoExamen::create(['name' => 'Biopsia', 'grupos_id' => 13, 'slug' => Str::slug('Biopsia', '_'), 'consumo' => 2]);
    }
}
