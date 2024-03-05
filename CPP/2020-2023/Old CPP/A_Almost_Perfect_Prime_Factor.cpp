#include <bits/stdc++.h>
using namespace std;


const int N = 1e5 + 20;
int arr[N];
int tre[N*4];

int gcd(int a, int b) // O(logN)
{
    if(!b) return a;
    return gcd(b,a%b);
}

void init(int node,int b,int e)
{
    if(b == e)
    {
         tre[node] = arr[b];
         return;
    }
    int mid = (b+e)>>1;
    int left = node*2;
    int right = (node*2) + 1;
    init(left,b,mid);
    init(right,mid+1,e);
    tre[node] = gcd(tre[left],tre[right]);
}

int query(int node, int b, int e, int l, int r)
{
    if(e < l || b > r) return 0;
    if(b >= l && e <= r)
    {
        return tre[node];
    }
    int mid = (b+e)>>1;
    int left = node*2;
    int right = (node*2) + 1;
    int x = query(left,b,mid,l,r);
    int y = query(right,mid+1,e,l,r);
    return gcd(x,y);
}

const int MX = 1e7+123;
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

map<int,int> mp;

void primeFactorization(int n,int s)
{
    for(auto x : prime)
    {
        if(x*x > n) break;

        if(n%x == 0)
        {
            if(s)
            {
                mp[x]++;
            }
            else mp[x]--;

            if(mp[x] == 0) mp.erase(x);

            while(n%x == 0)
            {
                n/=x;
            }
        }
    }
    if(n > 1) 
    {
        if(s)
        mp[n]++;
        else mp[n]--;
        if(mp[n] == 0) mp.erase(n);
    }
}


int main()
{
    //    Bismillah
    int t;
    cin >> t;
    primeGen( 1e6 );
    int Case = 0;
    while(t--)
    {
        int n,k;
        cin >> n >> k;
        for(int i = 0; i < n; i++)
        {
            cin >> arr[i+1];
        }
        init(1,1,n);



        // return 0;
        
        int l = 1, r = 1;
        int ans = 0;
        int vis[n+1] = {};
        
        for(int i = 1; i <= n; i++)
        {
            primeFactorization(arr[i],1);
            
            while(l <= i && mp.size() > k)
            {
                primeFactorization(arr[l],0);
                l++;
            }

            if(mp.size() == k && query(1,1,n,l,i) == 1)
            {
                ans = max(ans,i-l+1);
            }
        }
        
        cout << "Case " << ++Case << ": ";
        cout << ans << endl;

        mp.clear();

    }    
}