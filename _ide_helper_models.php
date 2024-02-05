<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Admin
 *
 * @property string $id
 * @property string|null $avatar
 * @property string $name
 * @property string $email
 * @property string|null $phone_e164
 * @property string $password
 * @property string $admin_role_id
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\AdminRole $role
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\AssignmentTask> $tasks
 * @property-read int|null $tasks_count
 * @method static \Database\Factories\AdminFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin query()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereAdminRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin wherePhoneE164($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin withoutTrashed()
 */
	class Admin extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models{
/**
 * App\Models\AdminRole
 *
 * @property string $id
 * @property string $name
 * @property array $permissions
 * @property int $notify_request_review_task
 * @property int $notify_mark_actual_complete_task
 * @property int $notify_payment_receipt_approval
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Admin> $admins
 * @property-read int|null $admins_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @method static \Database\Factories\AdminRoleFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|AdminRole newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminRole newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminRole onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminRole query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminRole whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminRole whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminRole whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminRole whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminRole whereNotifyMarkActualCompleteTask($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminRole whereNotifyPaymentReceiptApproval($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminRole whereNotifyRequestReviewTask($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminRole wherePermissions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminRole whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminRole withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminRole withoutTrashed()
 */
	class AdminRole extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models{
/**
 * App\Models\Assignment
 *
 * @property string $id
 * @property string|null $ref
 * @property string|null $pt_no
 * @property float|null $spa_price
 * @property float|null $sa_price
 * @property float|null $net_price
 * @property float|null $discount_percentage
 * @property float|null $discount_price
 * @property float|null $apdl
 * @property float|null $increase_wipp
 * @property \Illuminate\Support\Carbon|null $date_li_lo
 * @property \Illuminate\Support\Carbon|null $date_s_and_p
 * @property \Illuminate\Support\Carbon|null $date_sa
 * @property string|null $bank_ref
 * @property string|null $bank_branch
 * @property float|null $loan_amount
 * @property float|null $loan_amount_including_insurance
 * @property \Illuminate\Support\Carbon|null $loan_approved_date
 * @property float|null $legal_fees
 * @property float|null $disbursement_fees
 * @property string|null $sales_person_name
 * @property string|null $sales_person_contact
 * @property float|null $sales_commission
 * @property \Illuminate\Support\Carbon|null $sales_commission_received_at
 * @property float|null $sales_second_commission
 * @property \Illuminate\Support\Carbon|null $sales_second_commission_received_at
 * @property \Illuminate\Support\Carbon|null $letter_of_instruction_received_at
 * @property \Illuminate\Support\Carbon|null $original_letter_offer_received_at
 * @property \Illuminate\Support\Carbon|null $slo_received_at
 * @property string|null $legal_fees_received_at
 * @property string|null $different_sum_at
 * @property string|null $purchaser_1_name
 * @property string|null $purchaser_1_phone
 * @property string|null $purchaser_1_identity_no
 * @property string|null $purchaser_1_address
 * @property string|null $purchaser_2_name
 * @property string|null $purchaser_2_phone
 * @property string|null $purchaser_2_identity_no
 * @property string|null $purchaser_2_address
 * @property string|null $purchaser_3_name
 * @property string|null $purchaser_3_phone
 * @property string|null $purchaser_3_identity_no
 * @property string|null $purchaser_3_address
 * @property string|null $purchaser_4_name
 * @property string|null $purchaser_4_phone
 * @property string|null $purchaser_4_identity_no
 * @property string|null $purchaser_4_address
 * @property string|null $borrower_1_name
 * @property string|null $borrower_1_phone
 * @property string|null $borrower_1_identity_no
 * @property string|null $borrower_1_address
 * @property string|null $borrower_2_name
 * @property string|null $borrower_2_phone
 * @property string|null $borrower_2_identity_no
 * @property string|null $borrower_2_address
 * @property string|null $borrower_3_name
 * @property string|null $borrower_3_phone
 * @property string|null $borrower_3_identity_no
 * @property string|null $borrower_3_address
 * @property string|null $borrower_4_name
 * @property string|null $borrower_4_phone
 * @property string|null $borrower_4_identity_no
 * @property string|null $borrower_4_address
 * @property string|null $remark
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $processing_at
 * @property \Illuminate\Support\Carbon|null $completed_at
 * @property \Illuminate\Support\Carbon|null $rejected_at
 * @property \Illuminate\Support\Carbon|null $cancelled_at
 * @property string $developer_id
 * @property string $project_id
 * @property string $unit_id
 * @property string|null $bank_id
 * @property string|null $flow_id
 * @property string|null $flow_group_id Current Task Group Indicator
 * @property string|null $flow_task_id Current Task Indicator
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\Bank|null $bank
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Checklist> $checklists
 * @property-read int|null $checklists_count
 * @property-read \App\Models\Developer $developer
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Document> $documents
 * @property-read int|null $documents_count
 * @property-read \App\Models\Flow|null $flow
 * @property-read \App\Models\FlowGroup|null $flowGroup
 * @property-read \App\Models\FlowTask|null $flowTask
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Income> $incomes
 * @property-read int|null $incomes_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Payment> $payments
 * @property-read int|null $payments_count
 * @property-read \App\Models\ProgressClaim|null $progressClaim
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProgressClaim> $progressClaims
 * @property-read int|null $progress_claims_count
 * @property-read \App\Models\Project $project
 * @property-read \App\Models\AssignmentTask|null $task
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\AssignmentTask> $tasks
 * @property-read int|null $tasks_count
 * @property-read \App\Models\Unit $unit
 * @method static \Database\Factories\AssignmentFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereApdl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereBankBranch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereBankId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereBankRef($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereBorrower1Address($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereBorrower1IdentityNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereBorrower1Name($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereBorrower1Phone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereBorrower2Address($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereBorrower2IdentityNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereBorrower2Name($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereBorrower2Phone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereBorrower3Address($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereBorrower3IdentityNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereBorrower3Name($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereBorrower3Phone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereBorrower4Address($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereBorrower4IdentityNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereBorrower4Name($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereBorrower4Phone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereCancelledAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereCompletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereDateLiLo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereDateSAndP($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereDateSa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereDeveloperId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereDifferentSumAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereDisbursementFees($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereDiscountPercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereDiscountPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereFlowGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereFlowId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereFlowTaskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereIncreaseWipp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereLegalFees($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereLegalFeesReceivedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereLetterOfInstructionReceivedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereLoanAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereLoanAmountIncludingInsurance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereLoanApprovedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereNetPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereOriginalLetterOfferReceivedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereProcessingAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment wherePtNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment wherePurchaser1Address($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment wherePurchaser1IdentityNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment wherePurchaser1Name($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment wherePurchaser1Phone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment wherePurchaser2Address($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment wherePurchaser2IdentityNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment wherePurchaser2Name($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment wherePurchaser2Phone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment wherePurchaser3Address($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment wherePurchaser3IdentityNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment wherePurchaser3Name($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment wherePurchaser3Phone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment wherePurchaser4Address($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment wherePurchaser4IdentityNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment wherePurchaser4Name($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment wherePurchaser4Phone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereRef($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereRejectedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereSaPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereSalesCommission($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereSalesCommissionReceivedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereSalesPersonContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereSalesPersonName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereSalesSecondCommission($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereSalesSecondCommissionReceivedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereSloReceivedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereSpaPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereUnitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment withoutTrashed()
 */
	class Assignment extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models{
/**
 * App\Models\AssignmentTask
 *
 * @property string $id
 * @property string $name
 * @property string|null $description
 * @property string $auto_mark_status
 * @property string $auto_mark_unit_status
 * @property int $required_lawyer_approval
 * @property int $can_submit_claim
 * @property int $can_submit_payment
 * @property \Illuminate\Support\Carbon|null $start_at
 * @property \Illuminate\Support\Carbon|null $end_at
 * @property \Illuminate\Support\Carbon|null $request_review_at
 * @property \Illuminate\Support\Carbon|null $approved_at
 * @property string|null $approved_by
 * @property \Illuminate\Support\Carbon|null $completed_at
 * @property \Illuminate\Support\Carbon|null $actual_completed_at
 * @property string $flow_group_id
 * @property string $flow_task_id
 * @property string|null $admin_id Person In charge
 * @property string $assignment_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Admin|null $admin
 * @property-read \App\Models\Admin|null $approvedBy
 * @property-read \App\Models\Assignment $assignment
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Comment> $comments
 * @property-read int|null $comments_count
 * @property-read \App\Models\FlowGroup $flowGroup
 * @property-read \App\Models\FlowTask $flowTask
 * @property-read mixed $exact_action
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Payment> $payments
 * @property-read int|null $payments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProgressClaim> $progressClaims
 * @property-read int|null $progress_claims_count
 * @method static \Database\Factories\AssignmentTaskFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|AssignmentTask isPendingActualComplete()
 * @method static \Illuminate\Database\Eloquent\Builder|AssignmentTask isPendingComplete()
 * @method static \Illuminate\Database\Eloquent\Builder|AssignmentTask isPendingReview()
 * @method static \Illuminate\Database\Eloquent\Builder|AssignmentTask newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AssignmentTask newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AssignmentTask onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|AssignmentTask query()
 * @method static \Illuminate\Database\Eloquent\Builder|AssignmentTask whereActualCompletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssignmentTask whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssignmentTask whereApprovedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssignmentTask whereApprovedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssignmentTask whereAssignmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssignmentTask whereAutoMarkStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssignmentTask whereAutoMarkUnitStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssignmentTask whereCanSubmitClaim($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssignmentTask whereCanSubmitPayment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssignmentTask whereCompletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssignmentTask whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssignmentTask whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssignmentTask whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssignmentTask whereEndAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssignmentTask whereFlowGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssignmentTask whereFlowTaskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssignmentTask whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssignmentTask whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssignmentTask whereRequestReviewAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssignmentTask whereRequiredLawyerApproval($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssignmentTask whereStartAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssignmentTask whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssignmentTask withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|AssignmentTask withoutTrashed()
 */
	class AssignmentTask extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models{
/**
 * App\Models\Bank
 *
 * @property string $id
 * @property string $name
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Assignment> $assignments
 * @property-read int|null $assignments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @method static \Database\Factories\BankFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Bank isActive()
 * @method static \Illuminate\Database\Eloquent\Builder|Bank newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bank newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bank onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Bank query()
 * @method static \Illuminate\Database\Eloquent\Builder|Bank whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bank whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bank whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bank whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bank whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bank whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bank withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Bank withoutTrashed()
 */
	class Bank extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models{
/**
 * App\Models\Block
 *
 * @property string $id
 * @property string $name
 * @property float $progress
 * @property int $is_active
 * @property string $project_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\Project $project
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Unit> $units
 * @property-read int|null $units_count
 * @method static \Database\Factories\BlockFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Block isActive()
 * @method static \Illuminate\Database\Eloquent\Builder|Block newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Block newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Block onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Block query()
 * @method static \Illuminate\Database\Eloquent\Builder|Block whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Block whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Block whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Block whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Block whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Block whereProgress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Block whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Block whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Block withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Block withoutTrashed()
 */
	class Block extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models{
/**
 * App\Models\Checklist
 *
 * @property string $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $due_at
 * @property \Illuminate\Support\Carbon|null $completed_at
 * @property string|null $completeable_type
 * @property string|null $completeable_id
 * @property string $assignment_id
 * @property string $assignable_type
 * @property string $assignable_id
 * @property string $checkable_type
 * @property string $checkable_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $assignable
 * @property-read \App\Models\Assignment $assignment
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $checkable
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $completeable
 * @method static \Illuminate\Database\Eloquent\Builder|Checklist newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Checklist newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Checklist onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Checklist query()
 * @method static \Illuminate\Database\Eloquent\Builder|Checklist whereAssignableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Checklist whereAssignableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Checklist whereAssignmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Checklist whereCheckableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Checklist whereCheckableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Checklist whereCompleteableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Checklist whereCompleteableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Checklist whereCompletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Checklist whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Checklist whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Checklist whereDueAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Checklist whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Checklist whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Checklist whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Checklist withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Checklist withoutTrashed()
 */
	class Checklist extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models{
/**
 * App\Models\Comment
 *
 * @property string $id
 * @property string $body
 * @property string $commentable_type
 * @property string $commentable_id
 * @property string $admin_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Admin $admin
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $commentable
 * @method static \Database\Factories\CommentFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCommentableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCommentableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment withoutTrashed()
 */
	class Comment extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models{
/**
 * App\Models\Developer
 *
 * @property string $id
 * @property string|null $logo
 * @property string $slug
 * @property string $name
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Assignment> $assignments
 * @property-read int|null $assignments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DeveloperUser> $developerUsers
 * @property-read int|null $developer_users_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Project> $projects
 * @property-read int|null $projects_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\DeveloperFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Developer isActive()
 * @method static \Illuminate\Database\Eloquent\Builder|Developer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Developer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Developer onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Developer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Developer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Developer whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Developer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Developer whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Developer whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Developer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Developer whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Developer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Developer withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Developer withoutTrashed()
 */
	class Developer extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models{
/**
 * App\Models\DeveloperUser
 *
 * @property string $id
 * @property string $developer_id
 * @property string $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\Developer $developer
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|DeveloperUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeveloperUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeveloperUser onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|DeveloperUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|DeveloperUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeveloperUser whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeveloperUser whereDeveloperId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeveloperUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeveloperUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeveloperUser whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeveloperUser withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|DeveloperUser withoutTrashed()
 */
	class DeveloperUser extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models{
/**
 * App\Models\Document
 *
 * @property string $id
 * @property string $name File name as purpose
 * @property string $assignment_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Upload> $uploads
 * @property-read int|null $uploads_count
 * @method static \Database\Factories\DocumentFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Document newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Document newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Document onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Document query()
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereAssignmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Document withoutTrashed()
 */
	class Document extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models{
/**
 * App\Models\Flow
 *
 * @property string $id
 * @property string $name
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $last_used_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Assignment> $assignments
 * @property-read int|null $assignments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\FlowGroup> $groups
 * @property-read int|null $groups_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\FlowTask> $tasks
 * @property-read int|null $tasks_count
 * @method static \Database\Factories\FlowFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Flow isActive()
 * @method static \Illuminate\Database\Eloquent\Builder|Flow newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Flow newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Flow onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Flow query()
 * @method static \Illuminate\Database\Eloquent\Builder|Flow whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flow whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flow whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flow whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flow whereLastUsedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flow whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flow whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flow withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Flow withoutTrashed()
 */
	class Flow extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models{
/**
 * App\Models\FlowGroup
 *
 * @property string $id
 * @property string $name
 * @property string|null $description
 * @property string $flow_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\AssignmentTask> $assignmentTasks
 * @property-read int|null $assignment_tasks_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Assignment> $assignments
 * @property-read int|null $assignments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\Flow $flow
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\FlowTask> $flowTasks
 * @property-read int|null $flow_tasks_count
 * @method static \Database\Factories\FlowGroupFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|FlowGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FlowGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FlowGroup onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|FlowGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|FlowGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlowGroup whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlowGroup whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlowGroup whereFlowId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlowGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlowGroup whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlowGroup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlowGroup withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|FlowGroup withoutTrashed()
 */
	class FlowGroup extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models{
/**
 * App\Models\FlowTask
 *
 * @property string $id
 * @property string $name
 * @property string|null $description
 * @property int $max_processing_days
 * @property string $auto_mark_status
 * @property string $auto_mark_unit_status
 * @property int $required_lawyer_approval
 * @property int $can_submit_claim
 * @property int $can_submit_payment
 * @property int $sequence
 * @property string $flow_id
 * @property string $flow_group_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\AssignmentTask> $assignmentTasks
 * @property-read int|null $assignment_tasks_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\Flow $flow
 * @property-read \App\Models\FlowGroup $group
 * @method static \Database\Factories\FlowTaskFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|FlowTask newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FlowTask newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FlowTask onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|FlowTask query()
 * @method static \Illuminate\Database\Eloquent\Builder|FlowTask whereAutoMarkStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlowTask whereAutoMarkUnitStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlowTask whereCanSubmitClaim($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlowTask whereCanSubmitPayment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlowTask whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlowTask whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlowTask whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlowTask whereFlowGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlowTask whereFlowId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlowTask whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlowTask whereMaxProcessingDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlowTask whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlowTask whereRequiredLawyerApproval($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlowTask whereSequence($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlowTask whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlowTask withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|FlowTask withoutTrashed()
 */
	class FlowTask extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models{
/**
 * App\Models\Income
 *
 * @property string $id
 * @property string $name
 * @property string|null $description
 * @property float $amount
 * @property string $assignment_id
 * @property string|null $assignment_task_id
 * @property string $userable_type
 * @property string $userable_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Assignment $assignment
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\AssignmentTask|null $task
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Upload> $uploads
 * @property-read int|null $uploads_count
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $userable
 * @method static \Database\Factories\IncomeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Income newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Income newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Income onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Income query()
 * @method static \Illuminate\Database\Eloquent\Builder|Income whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Income whereAssignmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Income whereAssignmentTaskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Income whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Income whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Income whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Income whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Income whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Income whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Income whereUserableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Income whereUserableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Income withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Income withoutTrashed()
 */
	class Income extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models{
/**
 * App\Models\Payment
 *
 * @property string $id
 * @property string $name
 * @property string|null $description
 * @property float $amount
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $approved_at
 * @property string|null $approved_by
 * @property string|null $receipt
 * @property \Illuminate\Support\Carbon|null $receipt_uploaded_at
 * @property string|null $receipt_approved_by
 * @property string $assignment_id
 * @property string|null $assignment_task_id
 * @property string $userable_type
 * @property string $userable_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Admin|null $approvedBy
 * @property-read \App\Models\Assignment $assignment
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\Admin|null $receiptApprovedBy
 * @property-read \App\Models\AssignmentTask|null $task
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Upload> $uploads
 * @property-read int|null $uploads_count
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $userable
 * @method static \Database\Factories\PaymentFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Payment isApproved()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment isPendingApprove()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment isPendingReceiptApprove()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereApprovedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereApprovedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereAssignmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereAssignmentTaskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereReceipt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereReceiptApprovedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereReceiptUploadedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereUserableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereUserableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment withoutTrashed()
 */
	class Payment extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models{
/**
 * App\Models\PersonalAccessToken
 *
 * @property int $id
 * @property string $tokenable_type
 * @property string $tokenable_id
 * @property string $name
 * @property string $token
 * @property array|null $abilities
 * @property \Illuminate\Support\Carbon|null $last_used_at
 * @property \Illuminate\Support\Carbon|null $expires_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $tokenable
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken query()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken whereAbilities($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken whereExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken whereLastUsedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken whereTokenableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken whereTokenableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalAccessToken withoutTrashed()
 */
	class PersonalAccessToken extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Phase
 *
 * @property string $id
 * @property string $name
 * @property float $progress
 * @property int $is_active
 * @property string $project_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\Project $project
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Unit> $units
 * @property-read int|null $units_count
 * @method static \Database\Factories\PhaseFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Phase isActive()
 * @method static \Illuminate\Database\Eloquent\Builder|Phase newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Phase newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Phase onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Phase query()
 * @method static \Illuminate\Database\Eloquent\Builder|Phase whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phase whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phase whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phase whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phase whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phase whereProgress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phase whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phase whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Phase withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Phase withoutTrashed()
 */
	class Phase extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models{
/**
 * App\Models\ProgressClaim
 *
 * @property string $id
 * @property string $name
 * @property string|null $description
 * @property float $amount
 * @property float $percentage
 * @property \Illuminate\Support\Carbon|null $payment_received_at
 * @property string $assignment_id
 * @property string|null $assignment_task_id
 * @property string $userable_type
 * @property string $userable_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Assignment $assignment
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\AssignmentTask|null $task
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Upload> $uploads
 * @property-read int|null $uploads_count
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $userable
 * @method static \Illuminate\Database\Eloquent\Builder|ProgressClaim newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProgressClaim newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProgressClaim onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ProgressClaim query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProgressClaim whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgressClaim whereAssignmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgressClaim whereAssignmentTaskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgressClaim whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgressClaim whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgressClaim whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgressClaim whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgressClaim whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgressClaim wherePaymentReceivedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgressClaim wherePercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgressClaim whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgressClaim whereUserableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgressClaim whereUserableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgressClaim withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ProgressClaim withoutTrashed()
 */
	class ProgressClaim extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models{
/**
 * App\Models\Project
 *
 * @property string $id
 * @property string $code
 * @property string $name
 * @property int $is_active
 * @property string|null $developer_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Assignment> $assignments
 * @property-read int|null $assignments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Block> $blocks
 * @property-read int|null $blocks_count
 * @property-read \App\Models\Developer|null $developer
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Phase> $phases
 * @property-read int|null $phases_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Unit> $units
 * @property-read int|null $units_count
 * @method static \Database\Factories\ProjectFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Project isActive()
 * @method static \Illuminate\Database\Eloquent\Builder|Project newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Project query()
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereDeveloperId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Project withoutTrashed()
 */
	class Project extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models{
/**
 * App\Models\Unit
 *
 * @property string $id
 * @property string $plot_no unit_no
 * @property string|null $build_up
 * @property string|null $land_area
 * @property string|null $unit_type
 * @property float|null $spa_price
 * @property float|null $sa_price
 * @property string|null $source
 * @property string|null $remark
 * @property float $progress in percentage
 * @property string $status
 * @property string|null $block_id
 * @property string|null $phase_id
 * @property string $project_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Assignment|null $assignment
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Assignment> $assignments
 * @property-read int|null $assignments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\Block|null $block
 * @property-read \App\Models\Phase|null $phase
 * @property-read \App\Models\Project $project
 * @method static \Database\Factories\UnitFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Unit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Unit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Unit query()
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereBlockId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereBuildUp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereLandArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit wherePhaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit wherePlotNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereProgress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereSaPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereSpaPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereUnitType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereUpdatedAt($value)
 */
	class Unit extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models{
/**
 * App\Models\Upload
 *
 * @property string $id
 * @property string $path Stored Private Path
 * @property string $name Original File Name
 * @property int $size Original File Size
 * @property string $uploadable_type
 * @property string $uploadable_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read mixed $display_name
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $uploadable
 * @method static \Database\Factories\UploadFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Upload newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Upload newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Upload onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Upload query()
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereUploadableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereUploadableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Upload withoutTrashed()
 */
	class Upload extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property string $id
 * @property string|null $avatar
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Developer> $developers
 * @property-read int|null $developers_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutTrashed()
 */
	class User extends \Eloquent implements \OwenIt\Auditing\Contracts\Auditable {}
}

