<?php


namespace App\Helpers;


trait Authorizable
{


    /**
     * Override of callAction to perform the authorization before
     *
     * @param $method
     * @param $parameters
     * @return mixed
     */
    public function callAction($method, $parameters)
    {
        if( $ability = $this->getAbility($method) ) {
            $this->authorize($ability);
        }

        return parent::callAction($method, $parameters);
    }

    public function getAbility($method)
    {
        return request()->route()->getName();

    }

    private function getAbilities()
    {
        return $this->abilities;
    }

    public function setAbilities($abilities)
    {
        $this->abilities = $abilities;
    }
}
