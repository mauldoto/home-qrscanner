<?php $post_url = ''; ?>

<div class="form-content">
	<div class="row">
		<div class="col-sm-12" id="msg-info">
			<?php
			Flasher::msgInfo();
			?>
		</div>

		<form id="formID" action="<?= BASEURL; ?>/angket/inputmultiple" method="post">
			<section class="title-section">
				<div class="col-xs-12 col-sm-12 text-center mb-10">
					<h3><strong>ANGKET KARYAWAN</strong></h3>
					<strong>Silakan isi NIK, kemudian isilah angket berikut</strong>
				</div>
			</section>

			<section class="data-karyawan">
				<div class="col-xs-12 col-sm-12">
					<h5><strong>DATA KARYAWAN</strong></h5>
					<hr />
					<div>
						<label for="form-field-mask-1">
							NIK
						</label>

						<div class="form-group">
							<?php if (TYPE_INPUT === 'SELECT') : ?>
								<select class="form-control nik-select2" name="nik" id="nikSelect2" required></select>
							<?php else : ?>
								<input class="form-control mb-10" name="nik" placeholder="Contoh: H102023" required />
								<button type="button" class="btn btn-primary btn-block" id="btnLoad">Load</button>
							<?php endif; ?>
							<input type="hidden" id="isLoaded" value="">
						</div>

					</div>

					<div class="employee-detail" style="display: none;">
						<label for="form-field-mask-1">
							DETAIL
						</label>

						<div class="col-xs-12 mb-10">
							<div class="">
								<div class="col-xs-3">NIK</div>
								<div class="col-xs-1">:</div>
								<div class="col-xs-8" id="detailNIK"></div>
							</div>
							<div class="">
								<div class="col-xs-3">NAMA</div>
								<div class="col-xs-1">:</div>
								<div class="col-xs-8" id="detailNAME"></div>
							</div>
							<div class="">
								<div class="col-xs-3">JABATAN</div>
								<div class="col-xs-1">:</div>
								<div class="col-xs-8" id="detailJOB"></div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="isi-angket">
				<div class="col-xs-12 col-sm-12">
					<h5><strong>ISI ANGKET</strong></h5>
					<hr />
				</div>
			</section>

			<section>
				<?php foreach ($data['angket'][0] as $key => $angket) : ?>
					<div class="col-xs-12 col-sm-12 mb-10">

						<?php if ($key == 0) : ?>
							<div>
								<div class="col-xs-12 mb-5 pertanyaan"><?= $angket['P0'] ?></div>
							</div>
						<?php endif; ?>

						<div>
							<div class="col-xs-1 offset-3 angket"><?= $angket['NO'] ?>.</div>
							<div class="col-xs-10 mb-5 pertanyaan"><?= $angket['PERTANYAAN'] ?></div>
						</div>

						<div>
							<div class="col-xs-11 offset-12">
								<label class="radio">
									<input class="input-radio" type="radio" data-no="<?= $angket['NO'] ?>" data-sort="1" name="angket_<?= $angket['NO'] ?>" id="radio<?= $angket["NO"] ?>1" value="a" required>(A) <?= $angket['P1'] ?>
									<?php if ($angket['P1_REASON'] == 1) : ?>
										<textarea style="margin-top: 3px; display: none;" id="alasan<?= $angket["NO"] ?>-1" type="text" class="form-control input-<?= $angket['NO'] ?>" name="alasan_angket_<?= $angket['NO'] ?>a" rows="3" cols="5"></textarea>
									<?php endif; ?>
								</label>
								<label class="radio">
									<input class="input-radio" type="radio" data-no="<?= $angket['NO'] ?>" data-sort="2" name="angket_<?= $angket['NO'] ?>" id="radio<?= $angket["NO"] ?>2" value="b" required>(B) <?= $angket['P2'] ?>
									<?php if ($angket['P2_REASON'] == 1) : ?>
										<textarea style="margin-top: 3px; display: none;" id="alasan<?= $angket["NO"] ?>-2" type="text" class="form-control input-<?= $angket['NO'] ?>" name="alasan_angket_<?= $angket['NO'] ?>b" rows="3" cols="5"></textarea>
									<?php endif; ?>
								</label>
								<?php if ($angket['P3']) : ?>
									<label class="radio">
										<input class="input-radio" type="radio" data-no="<?= $angket['NO'] ?>" data-sort="3" name="angket_<?= $angket['NO'] ?>" id="radio<?= $angket["NO"] ?>3" value="c" required>(C) <?= $angket['P3'] ?>
										<?php if ($angket['P3_REASON'] == 1) : ?>
											<textarea style="margin-top: 3px; display: none;" id="alasan<?= $angket["NO"] ?>-3" type="text" class="form-control input-<?= $angket['NO'] ?>" name="alasan_angket_<?= $angket['NO'] ?>c" rows="3" cols="5"></textarea>
										<?php endif; ?>
									</label>
								<?php endif; ?>
								<?php if ($angket['P4']) : ?>
									<label class="radio">
										<input class="input-radio" type="radio" data-no="<?= $angket['NO'] ?>" data-sort="4" name="angket_<?= $angket['NO'] ?>" id="radio<?= $angket["NO"] ?>3" value="d" required>(D) <?= $angket['P4'] ?>
										<?php if ($angket['P4_REASON'] == 1) : ?>
											<textarea style="margin-top: 3px; display: none;" id="alasan<?= $angket["NO"] ?>-4" type="text" class="form-control input-<?= $angket['NO'] ?>" name="alasan_angket_<?= $angket['NO'] ?>d" rows="3" cols="5"></textarea>
										<?php endif; ?>
									</label>
								<?php endif; ?>
							</div>
						</div>
					</div>
				<?php endforeach; ?>

				<div class="form-khusus-karyawan">
					<?php foreach ($data['angket'][1] as $key => $angket) : ?>
						<div class="col-xs-12 col-sm-12 mb-10">

							<?php if ($key == 0) : ?>
								<div>
									<div class="col-xs-12 mb-5 pertanyaan"><?= $angket['P0'] ?></div>
								</div>
							<?php endif; ?>

							<div>
								<div class="col-xs-1 offset-3 angket"><?= $angket['NO'] ?>.</div>
								<div class="col-xs-10 mb-5 pertanyaan"><?= $angket['PERTANYAAN'] ?></div>
							</div>

							<div>
								<div class="col-xs-11 offset-12">
									<label class="radio">
										<input class="input-radio input-radio-karyawan" type="radio" data-no="<?= $angket['NO'] ?>" data-sort="1" name="angket_<?= $angket['NO'] ?>" id="radio<?= $angket["NO"] ?>1" value="a" required>(A) <?= $angket['P1'] ?>
										<?php if ($angket['P1_REASON'] == 1) : ?>
											<textarea style="margin-top: 3px; display: none;" id="alasan<?= $angket["NO"] ?>-1" type="text" class="form-control input-<?= $angket['NO'] ?>" name="alasan_angket_<?= $angket['NO'] ?>a" rows="3" cols="5"></textarea>
										<?php endif; ?>
									</label>
									<label class="radio">
										<input class="input-radio input-radio-karyawan" type="radio" data-no="<?= $angket['NO'] ?>" data-sort="2" name="angket_<?= $angket['NO'] ?>" id="radio<?= $angket["NO"] ?>2" value="b" required>(B) <?= $angket['P2'] ?>
										<?php if ($angket['P2_REASON'] == 1) : ?>
											<textarea style="margin-top: 3px; display: none;" id="alasan<?= $angket["NO"] ?>-2" type="text" class="form-control input-<?= $angket['NO'] ?>" name="alasan_angket_<?= $angket['NO'] ?>b" rows="3" cols="5"></textarea>
										<?php endif; ?>
									</label>
									<?php if ($angket['P3']) : ?>
										<label class="radio">
											<input class="input-radio input-radio-karyawan" type="radio" data-no="<?= $angket['NO'] ?>" data-sort="3" name="angket_<?= $angket['NO'] ?>" id="radio<?= $angket["NO"] ?>3" value="c" required>(C) <?= $angket['P3'] ?>
											<?php if ($angket['P3_REASON'] == 1) : ?>
												<textarea style="margin-top: 3px; display: none;" id="alasan<?= $angket["NO"] ?>-3" type="text" class="form-control input-<?= $angket['NO'] ?>" name="alasan_angket_<?= $angket['NO'] ?>c" rows="3" cols="5"></textarea>
											<?php endif; ?>
										</label>
									<?php endif; ?>
									<?php if ($angket['P4']) : ?>
										<label class="radio">
											<input class="input-radio input-radio-karyawan" type="radio" data-no="<?= $angket['NO'] ?>" data-sort="4" name="angket_<?= $angket['NO'] ?>" id="radio<?= $angket["NO"] ?>3" value="d" required>(D) <?= $angket['P4'] ?>
											<?php if ($angket['P4_REASON'] == 1) : ?>
												<textarea style="margin-top: 3px; display: none;" id="alasan<?= $angket["NO"] ?>-4" type="text" class="form-control input-<?= $angket['NO'] ?>" name="alasan_angket_<?= $angket['NO'] ?>d" rows="3" cols="5"></textarea>
											<?php endif; ?>
										</label>
									<?php endif; ?>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</section>

			<div class="col-xs-12">
				<button type="submit" class="col-xs-12 btn btn-primary">Save</button>
			</div>
	</div>
	</form>

</div>
</div>
</div>

<script>
	// document.getElementById("empId").focus();
</script>