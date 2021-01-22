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
        Grupos_detalle_tipoExamen::create(['name' => 'Biometría Hemática', 'grupos_id' => 1, 'slug' => Str::slug('Biometría Hemática', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Hematocrito', 'grupos_id' => 1, 'slug' => Str::slug('Hematocrito', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Hemoglobina', 'grupos_id' => 1, 'slug' => Str::slug('Hemoglobina', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Contaje de Hematíes', 'grupos_id' => 1, 'slug' => Str::slug('Contaje de Hematíes', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Contaje de Leucocitos', 'grupos_id' => 1, 'slug' => Str::slug('Contaje de Leucocitos', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Indices Hemáticos', 'grupos_id' => 1, 'slug' => Str::slug('Indices Hemáticos', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Sedimentación', 'grupos_id' => 1, 'slug' => Str::slug('Sedimentación', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Fórmula Leucocitaria', 'grupos_id' => 1, 'slug' => Str::slug('Fórmula Leucocitaria', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Grupo y Factor', 'grupos_id' => 1, 'slug' => Str::slug('Grupo y Factor', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Reticulocitos', 'grupos_id' => 1, 'slug' => Str::slug('Reticulocitos', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Drepanocitos', 'grupos_id' => 1, 'slug' => Str::slug('Drepanocitos', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Hematozoario', 'grupos_id' => 1, 'slug' => Str::slug('Hematozoario', '_')]);

//        Hemostasia y coagulación
        Grupos_detalle_tipoExamen::create(['name' => 'Palquetas', 'grupos_id' => 2, 'slug' => Str::slug('Palquetas', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'INR', 'grupos_id' => 2, 'slug' => Str::slug('INR', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Tiempo de Coagulación', 'grupos_id' => 2, 'slug' => Str::slug('Tiempo de Coagulación', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Tiempo de Sangría', 'grupos_id' => 2, 'slug' => Str::slug('Tiempo de Sangría', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'TP', 'grupos_id' => 2, 'slug' => Str::slug('TP', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'TTP', 'grupos_id' => 2, 'slug' => Str::slug('TTP', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Coombs Directo', 'grupos_id' => 2, 'slug' => Str::slug('Coombs Directo', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Coombs Indirecto', 'grupos_id' => 2, 'slug' => Str::slug('Coombs Indirecto', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Fibrinógeno', 'grupos_id' => 2, 'slug' => Str::slug('Fibrinógeno', '_')]);

//        Bioquímico y enzimático
        Grupos_detalle_tipoExamen::create(['name' => 'Glucosa', 'grupos_id' => 3, 'slug' => Str::slug('Glucosa', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Glucosa Postprandial', 'grupos_id' => 3, 'slug' => Str::slug('Glucosa Postprandial', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Curva de Glucosa', 'grupos_id' => 3, 'slug' => Str::slug('Curva de Glucosa', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Urea', 'grupos_id' => 3, 'slug' => Str::slug('Urea', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Ácido Urico', 'grupos_id' => 3, 'slug' => Str::slug('Ácido Urico', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Creatinina', 'grupos_id' => 3, 'slug' => Str::slug('Creatinina', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Colinesterasa', 'grupos_id' => 3, 'slug' => Str::slug('Colinesterasa', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Bilirrubina (D-I-T)', 'grupos_id' => 3, 'slug' => Str::slug('Bilirrubina (D-I-T)', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'AST (TGO)', 'grupos_id' => 3, 'slug' => Str::slug('AST (TGO)', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'ALT (TGP)', 'grupos_id' => 3, 'slug' => Str::slug('ALT (TGP)', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Hemoglobina Glicosilada Hb Alc', 'grupos_id' => 3, 'slug' => Str::slug('Hemoglobina Glicosilada Hb Alc', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Proteínas Totales', 'grupos_id' => 3, 'slug' => Str::slug('Proteínas Totales', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Albúmina', 'grupos_id' => 3, 'slug' => Str::slug('Albúmina', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Globulinas', 'grupos_id' => 3, 'slug' => Str::slug('Globulinas', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Lípidos Totales', 'grupos_id' => 3, 'slug' => Str::slug('Lípidos Totales', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Colesterol', 'grupos_id' => 3, 'slug' => Str::slug('Colesterol', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'HDL', 'grupos_id' => 3, 'slug' => Str::slug('HDL', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'LDL', 'grupos_id' => 3, 'slug' => Str::slug('LDL', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Triglicéridos', 'grupos_id' => 3, 'slug' => Str::slug('Triglicéridos', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Amilasa', 'grupos_id' => 3, 'slug' => Str::slug('Amilasa', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Lipasa', 'grupos_id' => 3, 'slug' => Str::slug('Lipasa', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Fosfatas Ácida', 'grupos_id' => 3, 'slug' => Str::slug('Fosfatas Ácida', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Fosfatasa Alcalina', 'grupos_id' => 3, 'slug' => Str::slug('Fosfatasa Alcalina', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Hierro Sérico', 'grupos_id' => 3, 'slug' => Str::slug('Hierro Sérico', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Procalcitonina', 'grupos_id' => 3, 'slug' => Str::slug('Procalcitonina', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Insulina', 'grupos_id' => 3, 'slug' => Str::slug('Insulina', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Troponina', 'grupos_id' => 3, 'slug' => Str::slug('Troponina', '_')]);

//        Serología
        Grupos_detalle_tipoExamen::create(['name' => 'ASTO', 'grupos_id' => 4, 'slug' => Str::slug('ASTO', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'PCR (Proteína C. Reactiva)', 'grupos_id' => 4, 'slug' => Str::slug('PCR (Proteína C. Reactiva)', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Factor Reumatoide', 'grupos_id' => 4, 'slug' => Str::slug('Factor Reumatoide', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'VRDL', 'grupos_id' => 4, 'slug' => Str::slug('VRDL', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'VIH (SIDA)', 'grupos_id' => 4, 'slug' => Str::slug('VIH (SIDA)', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Aglutinaciones Febriles', 'grupos_id' => 4, 'slug' => Str::slug('Aglutinaciones Febriles', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'H. Pylori (Serología)', 'grupos_id' => 4, 'slug' => Str::slug('H. Pylori (Serología)', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Hepatitis A-B-C', 'grupos_id' => 4, 'slug' => Str::slug('Hepatitis A-B-C', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'F.T.A ABS', 'grupos_id' => 4, 'slug' => Str::slug('F.T.A ABS', '_')]);

//        Orina
        Grupos_detalle_tipoExamen::create(['name' => 'Elemental y Microscópico', 'grupos_id' => 5, 'slug' => Str::slug('Elemental y Microscópico', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Gram Sedimento', 'grupos_id' => 5, 'slug' => Str::slug('Gram Sedimento', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Gram Gota Fresca (GF)', 'grupos_id' => 5, 'slug' => Str::slug('Gram Gota Fresca (GF)', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Proteinuria 24H', 'grupos_id' => 5, 'slug' => Str::slug('Proteinuria 24H', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Micro albuminuria', 'grupos_id' => 5, 'slug' => Str::slug('Micro albuminuria', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Drogas de abuso', 'grupos_id' => 5, 'slug' => Str::slug('Drogas de abuso', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Urocultivo y antibiograma', 'grupos_id' => 5, 'slug' => Str::slug('Urocultivo y antibiograma', '_')]);

//        Heces
        Grupos_detalle_tipoExamen::create(['name' => 'Coproparasitario', 'grupos_id' => 6, 'slug' => Str::slug('Coproparasitario', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Coprológico', 'grupos_id' => 6, 'slug' => Str::slug('Coprológico', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Polimorfo nucleares', 'grupos_id' => 6, 'slug' => Str::slug('Polimorfo nucleares', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Sangre Oculta', 'grupos_id' => 6, 'slug' => Str::slug('Sangre Oculta', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Rotavirus / Adenovirus', 'grupos_id' => 6, 'slug' => Str::slug('Rotavirus / Adenovirus', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'H. Pylori (Heces)', 'grupos_id' => 6, 'slug' => Str::slug('H. Pylori (Heces)', '_')]);

//        Bacteriología y Micología
        Grupos_detalle_tipoExamen::create(['name' => 'Fresco', 'grupos_id' => 7, 'slug' => Str::slug('Fresco', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Gram', 'grupos_id' => 7, 'slug' => Str::slug('Gram', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Ziehl', 'grupos_id' => 7, 'slug' => Str::slug('Ziehl', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'KOH (Bacteriología y Micología)', 'grupos_id' => 7, 'slug' => Str::slug('KOH (Bacteriología y Micología)', '_')]);

//        Hormonales
        Grupos_detalle_tipoExamen::create(['name' => 'T3', 'grupos_id' => 8, 'slug' => Str::slug('T3', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'T4', 'grupos_id' => 8, 'slug' => Str::slug('T4', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'TSH', 'grupos_id' => 8, 'slug' => Str::slug('TSH', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'HCG (Test embarazo)', 'grupos_id' => 8, 'slug' => Str::slug('HCG (Test embarazo)', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'HCG Cuantitativa', 'grupos_id' => 8, 'slug' => Str::slug('HCG Cuantitativa', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Hormona de Crecimiento', 'grupos_id' => 8, 'slug' => Str::slug('Hormona de Crecimiento', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'FSH', 'grupos_id' => 8, 'slug' => Str::slug('FSH', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Testosterona', 'grupos_id' => 8, 'slug' => Str::slug('Testosterona', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Progesterona', 'grupos_id' => 8, 'slug' => Str::slug('Progesterona', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Prolactina', 'grupos_id' => 8, 'slug' => Str::slug('Prolactina', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Estradiol', 'grupos_id' => 8, 'slug' => Str::slug('Estradiol', '_')]);

//        Electrolitos
        Grupos_detalle_tipoExamen::create(['name' => 'Sodio', 'grupos_id' => 9, 'slug' => Str::slug('Sodio', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Potasio', 'grupos_id' => 9, 'slug' => Str::slug('Potasio', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Calcio', 'grupos_id' => 9, 'slug' => Str::slug('Calcio', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Magnesio', 'grupos_id' => 9, 'slug' => Str::slug('Magnesio', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Fósforo', 'grupos_id' => 9, 'slug' => Str::slug('Fósforo', '_')]);

//        M. Tumorales
        Grupos_detalle_tipoExamen::create(['name' => 'PSA', 'grupos_id' => 10, 'slug' => Str::slug('PSA', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'PSA Libre', 'grupos_id' => 10, 'slug' => Str::slug('PSA Libre', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'CEA', 'grupos_id' => 10, 'slug' => Str::slug('CEA', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'CA 125', 'grupos_id' => 10, 'slug' => Str::slug('CA 125', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'CA 19-9', 'grupos_id' => 10, 'slug' => Str::slug('CA 19-9', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'CA-15-3', 'grupos_id' => 10, 'slug' => Str::slug('CA-15-3', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'CA72-4', 'grupos_id' => 10, 'slug' => Str::slug('CA72-4', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'A.F.P-4', 'grupos_id' => 10, 'slug' => Str::slug('A.F.P-4', '_')]);

//        Inmunomicrobiología
        Grupos_detalle_tipoExamen::create(['name' => 'Ac. Chlamidya (IgG IgM)', 'grupos_id' => 11, 'slug' => Str::slug('Ac. Chlamidya (IgG IgM)', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Ac. Herpes I (IgG IgM)', 'grupos_id' => 11, 'slug' => Str::slug('Ac. Herpes I (IgG IgM)', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Ac. Herpes II (IgG IgM)', 'grupos_id' => 11, 'slug' => Str::slug('Ac. Herpes II (IgG IgM)', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Rubeola', 'grupos_id' => 11, 'slug' => Str::slug('Rubeola', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Toxoplasma', 'grupos_id' => 11, 'slug' => Str::slug('Toxoplasma', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Citomegalovirus', 'grupos_id' => 11, 'slug' => Str::slug('Citomegalovirus', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'KOH (Inmunomicrobiología)', 'grupos_id' => 11, 'slug' => Str::slug('KOH (Inmunomicrobiología)', '_')]);

//        Pruebas de ADN
        Grupos_detalle_tipoExamen::create(['name' => 'Paternidad Estándar', 'grupos_id' => 12, 'slug' => Str::slug('Paternidad Estándar', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Paternidad Prenatal', 'grupos_id' => 12, 'slug' => Str::slug('Paternidad Prenatal', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'De Orígenes', 'grupos_id' => 12, 'slug' => Str::slug('De Orígenes', '_')]);

//        Histopatología
        Grupos_detalle_tipoExamen::create(['name' => 'Papanicolaou', 'grupos_id' => 13, 'slug' => Str::slug('Papanicolaou', '_')]);
        Grupos_detalle_tipoExamen::create(['name' => 'Biopsia', 'grupos_id' => 13, 'slug' => Str::slug('Biopsia', '_')]);
    }
}
