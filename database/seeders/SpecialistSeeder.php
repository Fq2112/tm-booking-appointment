<?php

namespace Database\Seeders;

use App\Models\Specialist;
use Illuminate\Database\Seeder;

class SpecialistSeeder extends Seeder
{
    const data = [
        [
            'name' => 'Anesthesiologists',
            'desc' => 'These doctors give you drugs to numb your pain or to put you under during surgery, childbirth, or other procedures. They monitor your vital signs while you’re under anesthesia.',
            'image' => 'anesthesiologists.jpg',
        ],
        [
            'name' => 'Cardiologists',
            'desc' => 'They’re experts on the heart and blood vessels. You might see them for heart failure, a heart attack, high blood pressure, or an irregular heartbeat.',
            'image' => 'cardiologists.jpg',
        ],
        [
            'name' => 'Dentist',
            'desc' => 'A dentist, also known as a dental surgeon, is a medical professional who specializes in dentistry, the diagnosis, prevention, and treatment of diseases and conditions of the oral cavity.',
            'image' => 'dentist.jpg',
        ],
        [
            'name' => 'Dermatologists',
            'desc' => 'Have problems with your skin, hair, nails? Do you have moles, scars, acne, or skin allergies? Dermatologists can help.',
            'image' => 'dermatologists.jpg',
        ],
        [
            'name' => 'Endocrinologists',
            'desc' => 'These are experts on hormones and metabolism. They can treat conditions like diabetes, thyroid problems, infertility, and calcium and bone disorders.',
            'image' => 'endocrinologists.jpg',
        ],
        [
            'name' => 'Gastroenterologists',
            'desc' => 'They’re specialists in digestive organs, including the stomach, bowels, pancreas, liver, and gallbladder. You might see them for abdominal pain, ulcers, diarrhea, jaundice, or cancers in your digestive organs. They also do a colonoscopy and other tests for colon cancer.',
            'image' => 'gastroenterologists.jpg',
        ],
        [
            'name' => 'Hematologists',
            'desc' => 'These are specialists in diseases of the blood, spleen, and lymph glands, like sickle cell disease, anemia, hemophilia, and leukemia.',
            'image' => 'hematologists.jpg',
        ],
        [
            'name' => 'Immunologists',
            'desc' => 'They treat immune system disorders such as asthma, eczema, food allergies, insect sting allergies, and some autoimmune diseases.',
            'image' => 'immunologists.jpg',
        ],
        [
            'name' => 'Internists',
            'desc' => 'These primary-care doctors treat both common and complex illnesses, usually only in adults. You’ll likely visit them or your family doctor first for any condition. Internists often have advanced training in a host of subspecialties, like heart disease, cancer, or adolescent or sleep medicine. With additional training (called a fellowship), internists can specialize in cardiology, gastroenterology, endocrinology, nephrology, pulmonology, and other medical sub-specialties.',
            'image' => 'internists.jpg',
        ],
        [
            'name' => 'Neurologists',
            'desc' => 'These are specialists in the nervous system, which includes the brain, spinal cord, and nerves. They treat strokes, brain and spinal tumors, epilepsy, Parkinson\'s disease, and Alzheimer\'s disease.',
            'image' => 'neurologists.jpg',
        ],
        [
            'name' => 'Obstetricians and Gynecologists',
            'desc' => 'Often called OB/GYNs, these doctors focus on women\'s health, including pregnancy and childbirth. They do Pap smears, pelvic exams, and pregnancy checkups. OB/GYNs are trained in both areas. But some of them may focus on women\'s reproductive health (gynecologists), and others specialize in caring for pregnant women (obstetricians).',
            'image' => 'gynecologists.jpg',
        ],
        [
            'name' => 'Oncologists',
            'desc' => 'These internists are cancer specialists. They do chemotherapy treatments and often work with radiation oncologists and surgeons to care for someone with cancer.',
            'image' => 'oncologists.jpg',
        ],
        [
            'name' => 'Ophthalmologists',
            'desc' => 'You call them eye doctors. They can prescribe glasses or contact lenses and diagnose and treat diseases like glaucoma. Unlike optometrists, they’re medical doctors who can treat every kind of eye condition as well as operate on the eyes.',
            'image' => 'ophthalmologists.jpg',
        ],
        [
            'name' => 'Osteopaths',
            'desc' => 'Doctors of osteopathic medicine (DO) are fully licensed medical doctors just like MDs. Their training stresses a “whole body” approach. Osteopaths use the latest medical technology but also the body’s natural ability to heal itself.',
            'image' => 'osteopaths.jpg',
        ],
        [
            'name' => 'Otolaryngologists',
            'desc' => 'They treat diseases in the ears, nose, throat, sinuses, head, neck, and respiratory system. They also can do reconstructive and plastic surgery on your head and neck.',
            'image' => 'otolaryngologists.jpg',
        ],
        [
            'name' => 'Pathologists',
            'desc' => 'These lab doctors identify the causes of diseases by examining body tissues and fluids under microscopes.',
            'image' => 'pathologists.jpg',
        ],
        [
            'name' => 'Physiatrists',
            'desc' => 'These specialists in physical medicine and rehabilitation treat neck or back pain and sports or spinal cord injuries as well as other disabilities caused by accidents or diseases.',
            'image' => 'physiatrists.jpg',
        ],
        [
            'name' => 'Psychiatrists',
            'desc' => 'These doctors work with people with mental, emotional, or addictive disorders. They can diagnose and treat depression, schizophrenia, substance abuse, anxiety disorders, and sexual and gender identity issues. Some psychiatrists focus on children, adolescents, or the elderly.',
            'image' => 'psychiatrists.jpg',
        ],
        [
            'name' => 'Pulmonologists',
            'desc' => 'You would see these specialists for problems like lung cancer, pneumonia, asthma, emphysema, and trouble sleeping caused by breathing issues.',
            'image' => 'pulmonologists.jpg',
        ],
        [
            'name' => 'Radiologists',
            'desc' => 'They use X-rays, ultrasound, and other imaging tests to diagnose diseases. They can also specialize in radiation oncology to treat conditions like cancer.',
            'image' => 'radiologists.jpg',
        ],
        [
            'name' => 'Urologists',
            'desc' => 'These are surgeons who care for men and women for problems in the urinary tract, like a leaky bladder. They also treat male infertility and do prostate exams.',
            'image' => 'urologists.jpg',
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::data as $val) {
            Specialist::create([
                'name' => $val['name'],
                'desc' => $val['desc'],
                'image' => $val['image'],
            ]);
        }
    }
}
