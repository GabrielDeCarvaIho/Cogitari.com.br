<?php 
/* Template Name: Tela de Autenticação */ 
get_header(); 
?>

<div style="height: 120px;"></div>

<main class="form-section">
    
    <div class="form-container glass">
        
        <div style="margin-bottom: 30px;">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cogitarilogo.png" style="height: 50px; margin: 0 auto;">
        </div>

        <div class="auth-toggle">
            <div class="auth-btn active" onclick="switchAuth('login')">Entrar</div>
            <div class="auth-btn" onclick="switchAuth('register')">Cadastrar</div>
        </div>

        <div id="form-login" class="form-content active">
            <h2 class="form-title">Bem-vindo de volta</h2>
            <p class="form-subtitle">Acesse sua conta para continuar.</p>

            <form name="loginform" id="loginform" action="<?php echo esc_url( site_url( 'wp-login.php', 'login_post' ) ); ?>" method="post">
                <div class="input-wrapper">
                    <input type="text" name="log" class="glass-input" placeholder="Usuário ou E-mail">
                </div>
                <div class="input-wrapper">
                    <input type="password" name="pwd" class="glass-input" placeholder="Sua Senha">
                    <i class="ph ph-eye toggle-password" onclick="togglePass(this)"></i>
                </div>
                
                <div style="text-align: left; margin-bottom: 20px;">
                    <label style="color: var(--text-grey); font-size: 0.85rem;">
                        <input type="checkbox" name="rememberme" value="forever"> Lembrar de mim
                    </label>
                </div>

                <button type="submit" class="btn-gradient" style="width: 100%;">Acessar Painel</button>
            </form>
            
            <div class="social-login-divider"><span>ou entre com</span></div>
            
            <div class="social-buttons">
                <div class="social-btn google"><i class="ph ph-google-logo"></i> Google</div>
                <div class="social-btn facebook"><i class="ph ph-facebook-logo"></i> Facebook</div>
                <div class="social-btn outlook"><i class="ph ph-microsoft-outlook-logo"></i> Outlook</div>
            </div>
            
            <div class="auth-extra-links">
                <a href="<?php echo wp_lostpassword_url(); ?>">Esqueceu a senha?</a>
            </div>
        </div>

        <div id="form-register" class="form-content">
            <h2 class="form-title">Criar nova conta</h2>
            <p class="form-subtitle">Junte-se à comunidade Cogitari.</p>

            <form action="<?php echo esc_url( site_url('wp-login.php?action=register', 'login_post') ); ?>" method="post" onsubmit="return validateAge()">
                
                <div class="input-wrapper">
                    <input type="text" name="fullname" class="glass-input" placeholder="Nome Completo" required>
                </div>

                <div class="input-wrapper">
                    <input type="date" id="dob" name="dob" class="glass-input" style="color:#94A3B8;" required max="<?php echo date('Y-m-d'); ?>">
                </div>

                <div class="input-wrapper">
                    <input type="email" name="user_email" class="glass-input" placeholder="Seu melhor E-mail" required>
                </div>
                
                <div class="input-wrapper">
                    <input type="password" id="reg_pass" name="user_pass" class="glass-input" placeholder="Crie uma Senha" onkeyup="checkStrength(this.value)" required>
                    <i class="ph ph-eye toggle-password" onclick="togglePass(this)"></i>
                </div>
                
                <div class="password-strength-container">
                    <div class="strength-bar-bg">
                        <div class="strength-bar-fill" id="strengthBar"></div>
                    </div>
                </div>

                <div class="input-wrapper">
                    <input type="password" name="confirm_pass" class="glass-input" placeholder="Repetir Senha" required>
                    <i class="ph ph-eye toggle-password" onclick="togglePass(this)"></i>
                </div>

                <button type="submit" class="btn-gradient" style="width: 100%;">Finalizar Cadastro</button>
            </form>

            <div class="social-login-divider"><span>ou registre com</span></div>
            
            <div class="social-buttons">
                <div class="social-btn google"><i class="ph ph-google-logo"></i> Google</div>
                <div class="social-btn facebook"><i class="ph ph-facebook-logo"></i> Facebook</div>
                <div class="social-btn outlook"><i class="ph ph-microsoft-outlook-logo"></i> Outlook</div>
            </div>
        </div>

    </div>

</main>

<script>
    // Script de Troca de Abas
    function switchAuth(type) {
        const lBtn = document.querySelector('.auth-btn:nth-child(1)');
        const rBtn = document.querySelector('.auth-btn:nth-child(2)');
        const lForm = document.getElementById('form-login');
        const rForm = document.getElementById('form-register');

        if (type === 'login') {
            lBtn.classList.add('active'); rBtn.classList.remove('active');
            lForm.classList.add('active'); rForm.classList.remove('active');
        } else {
            rBtn.classList.add('active'); lBtn.classList.remove('active');
            rForm.classList.add('active'); lForm.classList.remove('active');
        }
    }

    // Alternar Visibilidade da Senha
    function togglePass(icon) {
        const input = icon.previousElementSibling;
        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("ph-eye");
            icon.classList.add("ph-eye-slash");
        } else {
            input.type = "password";
            icon.classList.remove("ph-eye-slash");
            icon.classList.add("ph-eye");
        }
    }

    // Validação de Idade (12 anos)
    function validateAge() {
        const dob = document.getElementById('dob').value;
        if (!dob) return false;
        
        const birthDate = new Date(dob);
        const today = new Date();
        let age = today.getFullYear() - birthDate.getFullYear();
        const m = today.getMonth() - birthDate.getMonth();
        
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }

        if (age < 12) {
            alert("Você precisa ter pelo menos 12 anos para se registrar.");
            return false;
        }
        return true;
    }

    // Barra de Força da Senha
    function checkStrength(p) {
        let s = 0;
        const bar = document.getElementById('strengthBar');
        
        if (p.length > 5) s++;
        if (p.length > 7) s++;
        if (/[A-Z]/.test(p)) s++;
        if (/[0-9]/.test(p)) s++;
        if (/[^A-Za-z0-9]/.test(p)) s++;

        const colors = ['#ef4444', '#ef4444', '#f97316', '#eab308', '#84cc16', '#22c55e'];
        
        bar.style.width = (s * 20) + '%';
        bar.style.backgroundColor = colors[s];
    }
</script>

<?php get_footer(); ?>