<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;

class VatNumber implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (strlen($value) < 9) {
            $fail('Het BTW nummer moet minimaal 9 karakters bevatten');
        }

        if (strlen($value) > 14) {
            $fail('Het BTW nummer mag niet meer dan 14 karakters bevatten');
        }

        if (! preg_match('/^[a-zA-Z]{2}[0-9]{9,12}$/', $value)) {
            $fail('Het BTW nummer is niet geldig');
        }

        $response = Http::get('http://ec.europa.eu/taxation_customs/vies/checkVatService.wsdl', [
            'query' => [
                'wsdl' => '',
                'ms' => $value,
            ],
        ]);

        //  dd($response);

        if ($response->status() !== 200) {
            $fail('Er is een fout opgetreden bij het controleren van het BTW nummer');
        }

        $xml = simplexml_load_string($response->body());

    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return 'Het BTW nummer is niet geldig';
    }
}
