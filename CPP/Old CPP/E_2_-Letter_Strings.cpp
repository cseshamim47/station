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
void solve() //! watched youtube tutorial to solve(after few days of thinking)
{
    int i,j,m,n;
    n = in;
    map<char,int> l;    
    map<char,int> r;    
    map<string,int> whole;    
    string s[n];
    fo(i,n)
    {
        cin >> s[i];
        l[s[i][0]]++;
        r[s[i][1]]++;
        whole[s[i]]++;
    }

    int cnt = 0;
    fo(i,n-1)
    {
        cnt += max<int>(l[s[i][0]]-whole[s[i]],0);
        cnt += max<int>(r[s[i][1]]-whole[s[i]],0);

        if(l[s[i][0]]>0)
        l[s[i][0]]--;

        if(r[s[i][1]]>0)
        r[s[i][1]]--;

        if(whole[s[i]]>0)
        whole[s[i]]--;
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