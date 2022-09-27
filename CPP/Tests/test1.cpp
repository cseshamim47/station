#include <bits/stdc++.h>
using namespace std;

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


vector<int> primeFactorization(int n)
{
    vector<int> pf;
    for(auto x : prime)
    {
        if(x*x > n) break;

        while(n%x == 0)
        {
            n/=x;
            pf.push_back(x);
        }
    }
    if(n > 1) pf.push_back(n);
    return pf;
}

int main()
{
    //    Bismillah
    
}