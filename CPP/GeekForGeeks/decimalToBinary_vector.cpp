#include <iostream>
#include <vector>
using namespace std;

int main()
{
    int n;
    cin >> n;

    vector <int> v;
    
    while(n>0){
        int mod = n%2;
        v.push_back(mod);
        n /= 2;
    }

    for(int i = v.size()-1; i>=0; i--){
        cout << v[i] << " ";

    }
    
}