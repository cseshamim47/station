// In the name of ALLAH
// cseshamim47
// 18-11-2022 21:56:59

#include <bits/stdc++.h>
#include <ext/pb_ds/assoc_container.hpp>
using namespace std;
using namespace __gnu_pbds;

#define int long long
#define ll unsigned long long
#define uset tree<int, null_type, less_equal<int>, rb_tree_tag, tree_order_statistics_node_update >  /// cout<<*os.find_by_order(val)<<endl; // k-th element it /// less_equal = multiset, less = set, greater_equal = multiset decreasing, greater = set decreaseing ///  cout<<os.order_of_key(val)<<endl;  // strictly smaller or greater
#define fo(i,n) for(i=0;i<n;i++)
#define Fo(i,k,n) for(i=k;k<n?i<n:i>n;k<n?i+=1:i-=1)
#define YES printf("YES\n")
#define NO printf("NO\n")
#define MONE printf("-1\n")
#define vi vector<int>
#define vii vector<pair<int,int>>
#define pii pair<int,int>
#define pb push_back
#define pf push_front
#define F first
#define S second
#define clr(x,y) memset(x, y, sizeof(x))
#define deb(x) cout << #x << "=" << x << endl
#define deb2(x, y) cout << #x << "=" << x << "," << #y << "=" << y << endl
#define sq(x)  ( (x)*(x) )
#define s(x)   x.size()
#define all(x) x.begin(),x.end()
#define allg(x) x.begin(),x.end(),greater<int>()
#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define nl printf("\n");
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
template<typename T> istream& operator>>(istream& in, vector<T>& a) {for(auto &x : a) in >> x; return in;};
template<typename T> ostream& operator<<(ostream& out, vector<T>& a) {for(auto &x : a) out << x << ' ';nl; return out;};
template<typename T1, typename T2> ostream& operator<<(ostream& out, const pair<T1, T2>& x) {return out << x.F << ' ' << x.S  << endl;}
template<typename T1, typename T2> istream& operator>>(istream& in, pair<T1, T2>& x) {return in >> x.F >> x.S;}
template<typename T> void Unique(T &a) {a.erase(unique(a.begin(), a.end()), a.end());}
#define INF 1e9

int g;
struct{
    template<class T> operator T() {
        T x;
        cin >> x;
        return x;
    }
}in;

int dx[] = {-1, 1, 0, 0,-1,-1, 1,1};
int dy[] = { 0, 0,-1, 1,-1, 1,-1,1};

void f()
{}

int Case;

const int MX = 40200;
bitset<MX> is_prime;
vector<int> prime;

void primeGen ( int n )
{
    n += 100;
    for ( int i = 3; i <= n; i += 2 ) is_prime[i] = 1;

    int sq = sqrt ( n );
    for ( int i = 3; i <= sq; i += 2 ) {
        if ( is_prime[i] == 1 ) {
            for ( int j = i*i; j <= n; j += ( i + i ) ) {
                is_prime[j] = 0;
            }
        }
    }

    is_prime[2] = 1;
    prime.push_back (2);

    for ( int i = 3; i <= n; i += 2 ) {
        if ( is_prime[i] == 1 ) prime.push_back ( i );
    }
}

map<int,int> primeFactorization(int n)
{
    map<int,int> mp;;
    for(auto x : prime)
    {
        if(x*x > n) break;

        while(n%x == 0)
        {
            n/=x;
            mp[x]++;
        }
    }
    if(n > 1) mp[n]++;
    return mp;
}


int countZero(int n)
{
    string str = to_string(n);
    reverse(all(str));
    int cnt = 0;
    for(int i = 0; i < s(str); i++)
    {
        if(str[i] == '0') cnt++;
        else break;
    }
    return cnt;
}

void solve()
{
    int i=0,j=0,m=0,n=0,k=0,ans=0,cnt=0,odd=0,even=0,sum=0,l=0,r=0,p=0,q=0;
    n = in, k = in;
    m = k;
    k *= n;
    map<int,int> mp = primeFactorization(n);
    int cnt2 = mp[2], cnt5 = mp[5];
    int diff = 0;
    
    if(cnt2 > cnt5)
    {
        diff = cnt2-cnt5;
        int five = 1;
        int pow = 1;
        while(n*five*5 <= k && diff > 0)
        {
            five *= 5;
            diff--;
        }
        
        // deb(five);
        while(n*five*10 <= k)
        {
            five *= 10;
        }

        int more = (m/five)*five;

        if(countZero(more*n) <= countZero(k))
        {
            ans = n*m;
            cout << ans << endl;
        }else
        {
            ans = more*n;
            cout << ans << endl;
        }

    }else 
    {
        diff = abs(cnt5-cnt2);
        int two = 1;
        while(n*two*2 <= k && diff > 0)
        {
            two *= 2;
            diff--;
        }
        
        while(n*two*10 <= k)
        {
            two *= 10;
        }
        
        int more = (m/two)*two;

        if(countZero(more*n) <= countZero(k))
        {
            ans = n*m;
            cout << ans << endl;
        }else
        {
            ans = more*n;
            cout << ans << endl;
        }
    }

}

int32_t main()
{
      //        Bismillah
    // fileInput();
    // BOOST
    primeGen(40000);
    w(t)
    // solve();
    // f();
}