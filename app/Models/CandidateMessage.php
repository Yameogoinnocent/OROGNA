<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class CandidateMessage extends Model {
 protected $fillable=['candidate_id','admin_id','sender_type','body','read_at'];
 protected $casts=['read_at'=>'datetime'];
 public function candidate(): BelongsTo { return $this->belongsTo(User::class,'candidate_id'); }
 public function admin(): BelongsTo { return $this->belongsTo(User::class,'admin_id'); }
 public function isFromCandidate(): bool { return $this->sender_type === 'candidate'; }
}
