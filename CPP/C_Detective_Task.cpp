#include <bits/stdc++.h>
using namespace std;

#define fo(i,n) for(i=0;i<n;i++)
#define deb(x) cout << #x << "=" << x << endl
#define deb2(x, y) cout << #x << "=" << x << "," << #y << "=" << y << endl
#define sq(x)  ( (x)*(x) )
#define s(x)   x.size()
#define all(x) x.begin(),x.end()
#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define ll unsigned long long
#define MAX 1000006

struct{
    template<class T> operator T() {
        T x;
        cin >> x;
        return x;
    }
}in;

void fileInput()
{
    #ifndef ONLINE_JUDGE
        freopen("input.txt", "r", stdin);
        freopen("output.txt", "w", stdout);
    #endif
}

int gcd(int a, int b)
{
    if(!b) return a;
    return gcd(b,a%b);
}

void f()
{}

int Case;
void solve()
{
    int i,j,m,n;
    string str;
    cin >> str;
    n = s(str);
    int zero = 0;
    int o = 0;
    int q = 0;
    
    for(int i = 0; i < n; i++)
    {
        if(str[i] == '0') zero++;
        else if(str[i] == '1') o++;
        else q++;
    }

    if(str[0] == '0' || str[n-1] == '1' || n == 1)
    {
        cout << 1 << endl;
        return;
    }

    if(zero == 0) //! jhamela ase ekhane
    {
        if(o == n || q == n) cout << n << endl;
        else{
            int ans = 0;
            int x = 0;
            for(int i = n-1; i >= 0; i--)
            {
                if(str[i] == '1') x++;
                if(x == 1) break;
                if(str[i] == '?' || str[i] == '1') ans++;
            }
            ans++;
            cout << ans << endl;
        }
        return;
    }

    // ??1???

    int cnt = 1;
    for(i = n-1; i>=0; i--)
    {
        if(str[i] == '0' && zero > 0) zero--;

        if(str[i] == '0' && zero == 0) break; 
    }

    i--;
    for(i; i>=0; i--)
    {
        // cout << str[i];
        if(str[i] == '?') cnt++;
        else if(str[i] == '1')
        {
            cnt++;
            break;
        }else break;
    }

    cout << cnt << endl;
}

int32_t main()
{
      //        Bismillah
    // fileInput();
    // BOOST
    w(t)
    // solve();
    // f();
}