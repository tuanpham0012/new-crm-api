<?php

namespace App\Transformers;

use App\Models\Customer;
use League\Fractal\TransformerAbstract;

use function App\Helper\get_full_address;

class CustomerTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected array $defaultIncludes = [
        //
    ];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected array $availableIncludes = [
        //
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Customer $customer)
    {
        $data = [
            'id' => $customer->id,
            'uuid' => $customer->uuid,
            'code' => $customer->code,
            'first_name' => $customer->first_name,
            'last_name' => $customer->last_name,
            'full_name' => $customer->first_name . ' ' .$customer->last_name,
            'address' => $customer->address,
            'source' => $customer->source?->name,
            'full_address' => get_full_address($customer),
            'gender' => $customer->gender,
            'birthday' => $customer->birthday,
            'type' => $customer->type,
            'tax_code' => $customer->tax_code,
            'bank_id' => $customer->bank_id,
            'bank_number' => $customer->bank_number,
            'bank_username' => $customer->bank_username,
            'user_id' => $customer->user_id,
            'observer_id' => $customer->observer_id,
            'city_id' => $customer->city_id,
            'district_id' => $customer->district_id,
            'ward_id' => $customer->ward_id,
            'portal_id' => $customer->portal_id,
        ];

        if($customer->relationLoaded('emails')){
            $data = array_merge($data, [
                'emails' => fractal($customer->emails, new CustomerContactTransformer())->toArray()
            ]);
        }
        if($customer->relationLoaded('phones')){
            $data = array_merge($data, [
                'phones' => fractal($customer->phones, new CustomerContactTransformer())->toArray()
            ]);
        }
        if($customer->relationLoaded('messages')){
            $data = array_merge($data, [
                'messages' => fractal($customer->messages, new CustomerContactTransformer())->toArray()
            ]);
        }
        if($customer->relationLoaded('bank')){
            $data = array_merge($data, [
                'bank' => fractal($customer->bank, new BankTransformer())->toArray()
            ]);
        }
        if($customer->relationLoaded('files')){
            $data = array_merge($data, [
                'avatar' =>  fractal($customer->files, new FileTransfomer())->toArray()['data'][0] ?? null
            ]);
        }
        if($customer->relationLoaded('user')){
            $data = array_merge($data, [
                'user' => fractal($customer->user, new UserTransformer())->toArray()
            ]);
        }
        if($customer->relationLoaded('observer')){
            $data = array_merge($data, [
                'observer' => fractal($customer->observer, new UserTransformer())->toArray()
            ]);
        }
        if($customer->relationLoaded('source')){
            $data = array_merge($data, [
                'source' => $customer->source
            ]);
        }
        return $data;
    }
}
