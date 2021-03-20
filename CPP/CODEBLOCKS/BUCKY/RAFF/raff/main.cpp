#include <iostream>

using namespace std;

int main(){
    static int i = 0;

    cout << "Shamim " << i << endl;
    i++;
    main();

}
