#include <iostream>
#include <vector>
using namespace std;

int main()
{
    
    vector <int> v(5,3); // 3 3 3 3 3

    // for(auto x : v){
    //     cout << x << " ";
    // }

    for(int i = 0; i<v.size(); i++){
        cout << v[i] << " ";
    }


    
}