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
    int sum[n+1]={};
    fo(i,s(str))
    {
        sum[i+1] = sum[i] + str[i]-'a'+1;
    }

    if(s(str) == 1)
    {
        cout << "Bob " << sum[1] << endl;
        return;
    }

    if(s(str)%2 == 0)
    {
        cout << "Alice " << sum[s(str)] << endl;
    }else 
    {
        int a = sum[s(str)]-(str[s(str)-1]-'a'+1);
        int b = sum[s(str)]-(str[0]-'a'+1);
        int alice = max(a,b);
        cout << "Alice " << alice - (sum[s(str)]-alice) << endl;
    }
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