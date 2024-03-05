#include <bits/stdc++.h>
using namespace std;

#define fo(i,n) for(i=0;i<n;i++)
#define vi vector<int>
#define pb push_back
#define pf push_front
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
    n = in;
    string str = in;
    int cnt = 0;
    int one = 0, zero = 0;

    fo(i,n) 
        if(str[i] == '0') zero++;
        else one++;
    string nstr = str;
    for(int i = 0; i+1 < s(str); i++)
    {
        if(str[i] != str[i+1])
        {
            if(one > zero)
            {
                str[i] = '1';
                str[i+1] = '1';
            }else
            {
                str[i] = '0';
                str[i+1] = '0';
            }

            if(one < zero)
            {
                nstr[i] = '1';
                nstr[i+1] = '1';
            }else
            {
                nstr[i] = '0';
                nstr[i+1] = '0';
            }

            cnt++,i++;
        }
        else i++;
    }
    cout << cnt << " ";
    int tot = 1;
    int tot1 = 1;
    
    for(int i = 1; i < s(str); i++)
    {
        if(str[i] != str[i-1]) tot++;
        if(nstr[i] != nstr[i-1]) tot1++;
    }
    // deb2(tot,tot1);
    cout << min(tot,tot1) << endl;
    // cout << str << endl;
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