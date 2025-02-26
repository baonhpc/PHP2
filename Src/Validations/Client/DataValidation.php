<?php
namespace Src\Validations\Client;

class DataValidation
{
    protected array $errors = [];

    public function __invoke(array $data, array $rules = [], array $exceptions = []): array
    {
        foreach ($data as $key => $value) {
            if (in_array($key, $exceptions)) {
                continue;
            }

            if (!isset($rules[$key])) {
                continue;
            }

            foreach ($rules[$key] as $rule) {
                $this->validate($key, $value, $rule);
            }
        }

        return $this->errors;
    }

    protected function validate(string $field, mixed $value, string $rule): void
    {
        switch ($rule) {
            case 'required':
                if (empty(trim($value))) {
                    $this->addError($field, "$field không được để trống.");
                }
                break;

            case 'email':
                if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->addError($field, "$field không phải là email hợp lệ.");
                }
                break;

            case 'phone':
                if (!preg_match('/^0[0-9]{9}$/', $value)) {
                    $this->addError($field, "$field không phải là số điện thoại hợp lệ.");
                }
                break;


            case 'min:3':
                if (strlen($value) < 8) {
                    $this->addError($field, "$field phải có ít nhất 8 ký tự.");
                }
                break;

            case 'max:10':
                if (strlen($value) > 10) {
                    $this->addError($field, "$field không được vượt quá 10 ký tự.");
                }
                break;
        }
    }

    protected function addError(string $field, string $message): void
    {
        $this->errors[$field][] = $message;
    }
}
