#include <bits/stdc++.h>
#include <ext/pb_ds/assoc_container.hpp>
using namespace std;
using namespace __gnu_pbds;

#define int long long
#define ll unsigned long long
#define MAX 1000006
typedef tree<int, null_type, less_equal<int>, rb_tree_tag, tree_order_statistics_node_update > ordered_set;
// less_equal = multiset, less = set, greater_equal = multiset decreasing, greater = set decreaseing
/// cout<<*X.find_by_order(1)<<endl; // iterator to the k-th element
/// cout<<X.order_of_key(-5)<<endl;  // number of items in a set that are strictly smaller than our item
#define fo(i,n) for(i=0;i<n;i++)
#define Fo(i,k,n) for(i=k;k<n?i<n:i>n;k<n?i+=1:i-=1)
#define pi(x)	printf("%d\n",x)
#define pl(x)	printf("%lld\n",x)
#define plg(x)	printf("%lld ",x)
#define ps(s)	printf("%s\n",s)
#define Y printf("YES\n");
#define N printf("NO\n");
#define vi vector<int>
#define pb push_back
#define pf push_front
#define deb(x) cout << #x << "=" << x << endl
#define deb2(x, y) cout << #x << "=" << x << "," << #y << "=" << y << endl
#define sq(x)  ( (x)*(x) )
#define s(x)   x.size()
#define all(x) x.begin(),x.end()
#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define nl printf("\n");
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }

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
const int n = 1e6+10;
vector<int> primes;
bool isPrime[n];
int i;


void f()
{
    memset(isPrime,1,sizeof(isPrime));
    isPrime[1] = 0;

    for(int i = 2; i < n; i++)
    {
        for(int j = i+i; j < n; j+=i)
        {
            isPrime[j] = 0;
        }
    }

    Fo(i,2,n) if(isPrime[i]) primes.push_back(i);
}

int Case;
void solve()
{
    int i,j,m,n;

    while(true)
    {
        int l = 0;
        int r = primes.size()-1;
        m = in;
        if(!m) return;
        bool ok = true;
        while(l <= r)
        {
            int sum = primes[l] + primes[r];
            if(sum == m)
            {
                printf("%lld = %lld + %lld\n",m,primes[l],primes[r]);
                ok = false;
                break;
            }else if(sum > m) r--;
            else l++;
        }

        if(ok) cout << "Goldbach's conjecture is wrong." << endl;

    }
}

int32_t main()
{
      //        Bismillah
    // fileInput();
    // BOOST
    f();
    // w(t)
    solve();
}