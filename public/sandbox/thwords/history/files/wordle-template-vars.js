var k = `
<div class="tile" data-state="empty" data-animation="idle"></div>`;

var w = `<div class="row"></div>`;

var Sa = `
<div class="sections">
    <section>
        <div class="setting">
            <div class="text">
                <div class="title">Hard Mode</div>
                <div class="description">Any revealed hints must be used in subsequent guesses</div>
            </div>
            <div class="control">
                <game-switch id="hard-mode" name="hard-mode"></game-switch>
            </div>
        </div>
        <div class="setting">
            <div class="text">
                <div class="title">Dark Theme</div>
            </div>
            <div class="control">
                <game-switch id="dark-theme" name="dark-theme"></game-switch>
            </div>
        </div>
        <div class="setting">
            <div class="text">
                <div class="title">Color Blind Mode</div>
                <div class="description">High contrast colors</div>
            </div>
            <div class="control">
                <game-switch id="color-blind-theme" name="color-blind-theme"></game-switch>
            </div>
        </div>
    </section>
    <section>
        <div class="setting">
            <div class="text">
                <div class="title">Feedback</div>
            </div>
            <div class="control">
                <a href="mailto:wordle@powerlanguage.co.uk?subject=Feedback" title="wordle@powerlanguage.co.uk">Email</a>
                |
                <a href="https://twitter.com/intent/tweet?screen_name=powerlanguish" target="blank" title="@powerlanguish">Twitter</a>
            </div>
        </div>
    </section>
</div>
<div id="footnote">
    <div>
        <div id="privacy-policy"><a href="https://www.powerlanguage.co.uk/privacy-policy.html" target="_blank">Privacy Policy</a></div>
        <div id="copyright">Copyright 2021-2022. All Rights Reserved.</div>
    </div>
    <div>
        <div id="puzzle-number"></div>
        <div id="hash"></div>
    </div>
</div>`

var qa = `<div class="toast"></div>`;

var Ka = `
<game-theme-manager>
    <div id="game">
        <header>
            <div class="menu">
                <button id="help-button" class="icon" aria-label="help">
                    <game-icon icon="help"></game-icon>
                </button>
            </div>
            <div class="title">
                THWORDS
            </div>
            <div class="menu">
                <button id="statistics-button" class="icon" aria-label="statistics">
                    <game-icon icon="statistics"></game-icon>
                </button>
                <button id="settings-button" class="icon" aria-label="settings">
                    <game-icon icon="settings"></game-icon>
                </button>
            </div>
        </header>
        <div id="board-container">
            <div id="board"></div>
        </div>
        <game-keyboard></game-keyboard>
        <game-modal></game-modal>
        <game-page></game-page>
        <div class="toaster" id="game-toaster"></div>
        <div class="toaster" id="system-toaster"></div>
    </div>
</game-theme-manager>
<div id="debug-tools"></div>`

var Qa = `
<button id="reveal">reveal</button>
<button id="shake">shake</button>
<button id="bounce">bounce</button>
<button id="toast">toast</button>
<button id="modal">modal</button>`;

var os = `
<div class="overlay">
    <div class="content">
        <slot></slot>
        <div class="close-icon">
            <game-icon icon="close"></game-icon>
        </div>
    </div>
</div>`;

var rs = `<div id="keyboard"></div>`;

var Cs = `
<div class="container">
    <h1>Statistics</h1>
    <div id="statistics"></div>
    <h1>Guess Distribution</h1>
    <div id="guess-distribution"></div>
    <div class="footer"></div>
</div>`;

var Ls = `
<div class="statistic-container">
    <div class="statistic"></div>
    <div class="label"></div>
</div>`;

var Ts = `
<div class="graph-container">
    <div class="guess"></div>
    <div class="graph">
        <div class="graph-bar">
            <div class="num-guesses">
            </div>
        </div>
    </div>
</div>`

var Is = `
<div class="countdown">
    <h1>Next WORDLE</h1>
    <div id="timer">
        <div class="statistic-container">
            <div class="statistic timer">
                <countdown-timer></countdown-timer>
            </div>
        </div>
    </div>
</div>
<div class="share">
    <button id="share-button">
        Share <game-icon icon="share"></game-icon>
    </button>
</div>`;

// NOTE: I think there's a code error in Wordle here because it's missing the closing <span> tag
var Rs = `
<div class="container">
    <label><slot></slot></label>
    <div class="switch">
        <span class="knob"></span>
    </div>
</div>`;

var $s = `
<section>
    <div class="instructions">
        <p>Guess the <strong>WORDLE</strong> in 6 tries.</p>
        <p>Each guess must be a valid 5 letter word. Hit the enter button to submit.</p>
        <p>After each guess, the color of the tiles will change to show how close your guess was to the word.</p>
        <div class="examples">
            <p><strong>Examples</strong></p>
            <div class="example">
                <div class="row">
                    <game-tile letter="w" evaluation="correct" reveal></game-tile>
                    <game-tile letter="e"></game-tile>
                    <game-tile letter="a"></game-tile>
                    <game-tile letter="r"></game-tile>
                    <game-tile letter="y"></game-tile>
                </div>
                <p>The letter <strong>W</strong> is in the word and in the correct spot.</p>
            </div>
            <div class="example">
                <div class="row">
                    <game-tile letter="p"></game-tile>
                    <game-tile letter="i" evaluation="present" reveal></game-tile>
                    <game-tile letter="l"></game-tile>
                    <game-tile letter="l"></game-tile>
                    <game-tile letter="s"></game-tile>
                </div>
                <p>The letter <strong>I</strong> is in the word but in the wrong spot.</p>
            </div>
            <div class="example">
                <div class="row">
                    <game-tile letter="v"></game-tile>
                    <game-tile letter="a"></game-tile>
                    <game-tile letter="g"></game-tile>
                    <game-tile letter="u" evaluation="absent" reveal></game-tile>
                    <game-tile letter="e"></game-tile>
                </div>
                <p>The letter <strong>U</strong> is not in the word in any spot.</p>
            </div>
        </div>
        <p><strong>A new WORDLE will be available each day!<strong></p>
    </div>
</section>`;

var Ns = `
<div class="overlay">
    <div class="content">
        <header>
            <h1><slot></slot></h1>
            <game-icon icon="close"></game-icon>
        </header>
        <div class="content-container">
            <slot name="content"></slot>
        </div>
    </div>
</div>`;
