# Node.js

## Install

* Homebrew

```
brew install nodebrew
```

```
nodebrew --version
```

**List remote versions**
```
nodebrew ls-remote
```

**Install stable version**
```
mkdir -p ~/.nodebrew/src
nodebrew install-binary stable
nodebrew ls
```

**Select version**
```
nodebrew use vXX.XX.XX
nodebrew ls
```

**PATH**
```
echo 'export PATH=$HOME/.nodebrew/current/bin:$PATH' >> ~/.zprofile
source ~/.zprofile
```

**Check**
```
node --version
npm --version
npx --version
```
