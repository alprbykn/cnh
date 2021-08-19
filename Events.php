<?php

declare(strict_types=1);

include("TransformResponseException.php");
include("CoinGeckoClient.php");
include("Events.php");
include("exchanges.php");
include("Ping.php");
include("header.php");
include("ResponseTransformer.php");
include("Simple.php");
class Events extends Api
{
    /**
     * @param array $params
     * @return array
     * @throws Exception
     */
    public function getEvents(array $params = []): array
    {
        return $this->get('/events', $params);
    }

    /**
     * @return array
     * @throws Exception
     */
    public function getCountries(): array
    {
        return $this->get('/events/countries');
    }

    /**
     * @return array
     * @throws Exception
     */
    public function getTypes(): array
    {
        return $this->get('/events/types');
    }
}
