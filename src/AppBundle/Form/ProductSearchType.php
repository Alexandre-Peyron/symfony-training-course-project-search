<?php

namespace AppBundle\Form;

use AppBundle\Enum\ProductSearchCriteria as Criteria;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class ProductSearchType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->setMethod('GET')
            ->add(Criteria::SEARCH, TextType::class, [
                'required' => false
            ])
            ->add(Criteria::PREMIUM, CheckboxType::class, [
                'label'    => 'Livraison rapide',
                'required' => false
            ])
            ->add(Criteria::PRICE_MIN, IntegerType::class, [
                'required' => false
            ])
            ->add(Criteria::PRICE_MAX, IntegerType::class, [
                'required' => false
            ])
            ->add(Criteria::NOTE, ChoiceType::class, [
                'label'    => 'Note minimum',
                'data'     => 1,
                'choices'  => [
                    '★☆☆☆☆' => 1,
                    '★★☆☆☆' => 2,
                    '★★★☆☆' => 3,
                    '★★★★☆' => 4,
                    '★★★★★' => 5,
                ],
                'expanded' => true,
                'multiple' => false
            ])
            ->add(Criteria::TYPE, EntityType::class, [
                'placeholder'  => 'Type de produits',
                // query choices from this entity
                'class'        => 'AppBundle:Type',
                // use the User.username property as the visible option string
                'choice_label' => 'name',
                'required'     => false,
            ])
            ->add(Criteria::BRAND, EntityType::class, [
                'placeholder'  => 'Marque',
                // query choices from this entity
                'class'        => 'AppBundle:Brand',
                // use the User.username property as the visible option string
                'choice_label' => 'name',
                'required'     => false,
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_product_search';
    }
}
