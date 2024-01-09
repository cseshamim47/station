#include <bits/stdc++.h>
using namespace std;

#define io              ios_base::sync_with_stdio(false); cin.tie(NULL); cout.tie(NULL);
#define endl            "\n"
#define fr1( i, a, n )  for( long long i = a; i < n; i++ )
#define fr( i, n )      for( long long i = 0; i < n; i++ )
#define rf( i, n )      for( long long i = n-1; i >= 0; i-- )
#define py              cout << "YES\n";
#define pyy             cout << "Yes\n";
#define pn              cout << "NO\n";
#define pnn             cout << "No\n";
#define all(v)          v.begin(),v.end()
#define pb              push_back
#define vll             vector<long long>
#define mll             map<long long,long long>
#define vpll            vector<pair<long long,long long>>
#define lb(v,x)         lower_bound(all(v),x)-v.begin()
#define ub(v,x)         upper_bound(all(v),x)-v.begin()
#define precision(a)    cout << fixed << setprecision(a) 
#define mem(x,y)        memset(x,y,sizeof(x))
#define pll             pair<ll,ll>
#define sr(a)           sort(all(a))
#define srg(a)          sort(all(a),greater<>())
#define re              return;

#define int long long
typedef long long ll;

void fast(){
    io;
    #ifndef ONLINE_JUDGE
        freopen("input.txt","r",stdin);
        /*freopen("output.txt","w",stdout);*/
    #endif
}




void solve(){
 
    // ll n;   cin >> n;
    // vll a(n);   for ( int i = 0; i < n; i++ )  cin >> a[i];
    

    string s;   int n;      cin >> s >> n;
    string ss;
    cin.ignore();
    getline(cin,ss);

    string t;   int m;      cin >> t >> m;
    string tt;  
    cin.ignore();
    getline(cin,tt);

    // cout << s << n << endl << t << m << endl;
    // cout << ss << endl << tt << endl;

    
    int d = m-n;
    int h1, m1,s1;
    int h2, m2,s2;

    h1 = ((ss[0]-'0') * 10 + ( ss[1] - '0'));
    h2 = ((tt[0]-'0') * 10 + ( tt[1] - '0'));

    m1 = ((ss[5]-'0') * 10 + ( ss[6] - '0'));
    m2 = ((tt[5]-'0') * 10 + ( tt[6] - '0'));

    s1 = ((ss[10]-'0') * 10 + ( ss[11] - '0'));
    s2 = ((tt[10]-'0') * 10 + ( tt[11] - '0'));


    // for ( int i = 0; i < ss.size(); i++ ){

    // }

    if ( h2 < h1 )  d--;

    if ( h2 < h1 )  h2 += 24;
    int h; 
    h = h2-h1;

    if ( m2 < m1 ){
        h--;
        m2 += 60;
    }

    int mi = m2-m1;

    if ( s2 < s1 ){
        mi--;
        s2 += 60;
    }

    int sc = s2-s1;

    if ( sc < 0 ){
        sc += 60;
        mi--;
    }

    if ( mi < 0 ){
        mi += 60;
        h--;
    }

    if ( h < 0 ){
        h += 24;
        d--;
    }



    
    // cout << d << " " << h1 << " " << m1 << ' ' << s1 << endl;
    // cout << d << " " << h2 << " " << m2 << ' ' << s2 << endl;

    cout << d << " day(s)\n"
         << h << " hour(s)\n"
        << mi << " minute(s)\n"
        << sc << " second(s)" << endl;
    
}

    
signed main(){
    // class Timer { private: chrono::time_point <chrono::steady_clock> Begin, End; public: Timer () : Begin(), End (){ Begin = chrono::steady_clock::now(); } ~Timer () { End = chrono::steady_clock::now();cerr << "\nDuration: " << ((chrono::duration <double>)(End - Begin)).count() << "s\n"; } } T;
    // fast(); 
    ll tt = 1;
    // cin >> tt;
    ll i = 1;
    while ( tt-- > 0 ){
        // cout << "Case " << i++ << ": ";
        solve();
    }      
    return 0;
}